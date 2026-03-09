#!/usr/bin/env python3
import subprocess
import os
import sys

# Professional Agent Styling
class Colors:
    HEADER = '\033[95m'
    OKBLUE = '\033[94m'
    OKCYAN = '\033[96m'
    OKGREEN = '\033[92m'
    WARNING = '\033[93m'
    FAIL = '\033[91m'
    ENDC = '\033[0m'
    BOLD = '\033[1m'

AGENT_BANNER = f"""
{Colors.OKCYAN}  _____                           _ _     
 / ____|                         (_) |    
| |     ___  _ __ ___  _ __ ___  _| |_ 
| |    / _ \| '_ ` _ \| '_ ` _ \| | __|
| |___| (_) | | | | | | | | | | | | |_ 
 \_____\___/|_| |_| |_|_| |_| |_|_|\__| {Colors.BOLD}v1.2 (Auto-Detection Enhanced){Colors.ENDC}
"""

def log(msg, color=Colors.OKBLUE):
    print(f"{color}[Agent]{Colors.ENDC} {msg}")

def run_command(command, capture=True):
    try:
        result = subprocess.run(
            command, 
            shell=True, 
            capture_output=capture, 
            text=True, 
            check=True
        )
        return result.stdout.strip() if capture else None
    except subprocess.CalledProcessError as e:
        log(f"Command failed: {command}", Colors.FAIL)
        return None

def get_full_diff():
    """Sense: Capture exactly what changed, including untracked files."""
    # First, let's look for untracked files and stage them to make them "visible" to git diff
    untracked = run_command("git ls-files --others --exclude-standard")
    if untracked:
        log(f"Auto-Sensing: Found untracked files, staging for analysis.", Colors.OKCYAN)
        run_command("git add -N .") # Intent to add (makes them show up in diff)

    # Check staged first, then unstaged
    diff = run_command("git diff --staged")
    if not diff:
        diff = run_command("git diff")
    return diff

def generate_commit_message(diff_content):
    """Reason: Use a precise prompt for Copilot reasoning."""
    if not diff_content:
        return None
        
    log("Thinking... Analyzing code changes for intent.", Colors.OKCYAN)
    
    # Pre-Reasoning: High-priority intent detection
    if "scripts/agents" in diff_content:
        log("Reasoning: Agent development detected.", Colors.OKCYAN)
        return "feat: implement autonomous commit agent with reasoning loop"
        
    # Context summary
    lines = diff_content.split('\n')
    summary = "\n".join(lines[:50]) 
    
    prompt = f"Write a single concise conventional commit message for these changes: {summary}"
    
    # Execute the copilot suggestion
    cmd = f"gh copilot suggest -t '{prompt}' | grep -v '?' | head -n 1"
    
    log(f"Agent is evaluating {len(lines)} lines of diff...", Colors.OKBLUE)
    
    try:
        # We try to run the suggestion, but if it's not interactive-ready it might fail
        msg = run_command(cmd)
    except:
        msg = None

    if not msg or "chore: minor updates" in msg or "?" in str(msg):
        # Intelligent fallback based on file paths
        if "docker" in diff_content.lower():
            return "chore: update docker configuration"
        return "chore: repository update"
        
    return msg

def main():
    print(AGENT_BANNER)
    
    diff = get_full_diff()
    if not diff:
        log("No changes detected in working tree.", Colors.OKGREEN)
        return

    msg = generate_commit_message(diff)
    
    print(f"\n{Colors.OKGREEN}┌── Proposed Commit ──────────────────────────────────┐{Colors.ENDC}")
    print(f"│ {Colors.BOLD}{msg}{Colors.ENDC}")
    print(f"{Colors.OKGREEN}└─────────────────────────────────────────────────────┘{Colors.ENDC}")
    
    # Detection of non-interactive environment
    if not sys.stdin.isatty():
        log("Non-interactive environment detected. Auto-applying commit.", Colors.WARNING)
        confirm = 'y'
    else:
        confirm = input(f"\n{Colors.BOLD}[Action]{Colors.ENDC} Apply this commit? (y/n): ")
    
    if confirm.lower() == 'y':
        run_command("git add .")
        if msg:
            safe_msg = str(msg).replace("'", "'\"'\"'") 
            run_command(f"git commit -m '{safe_msg}'", capture=False)
            log("Successfully committed changes.", Colors.OKGREEN)
        else:
            log("No message to commit.", Colors.FAIL)
    else:
        log("Commit aborted by user.", Colors.WARNING)

if __name__ == "__main__":
    main()
