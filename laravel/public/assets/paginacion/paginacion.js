const divData = document.getElementById("paginationExample");
const totalPages = divData.getAttribute("total");
let initialActive = Number(divData.getAttribute("initialpage"));
(document.getElementById("lista-paginador").innerHTML =
  dibujarElementos(totalPages, initialActive));

function dibujarElementos(pages, page) {
  let liTag = "";
  let active;
  let beforePages = page - 1;
  let afterPages = page + 1;

  if (page > 1) {
    liTag += `<li class="page-item-govco prev-page-govco no"><a href="javascript:void(0)" onclick="_dibujarElementos(${pages}, ${page - 1})"><span class="prev-page-icon-govco"></span><span class="prev-page-text-govco">Anterior</span></a></li>`;
  } else if (page == 1) {
    liTag += `<li class="page-item-govco prev-page-govco disabled-govco"><a href="javascript:void(0)"><span class="prev-page-icon-govco"></span><span class="prev-page-text-govco">Anterior</span></a></li>`;
  }

  if (pages < 6) {
    for (let p = 1; p <= pages; p++) {
      active = page == p ? "active-govco" : "no";
      liTag += `<li class="page-item-govco number-govco ${active}"><a href="javascript:void(0)" onclick="_dibujarElementos(${pages}, ${p})">${p}</a></li>`;
    }
  } else {
    if (page > 2) {
      liTag += `<li class="page-item-govco number-govco"><a href="javascript:void(0)" onclick="_dibujarElementos(${pages}, 1)">1</a></li>`;
      if (page > 3) {
        liTag += `<li class="page-item-govco dots-govco"><a>...</a></li>`;
      }
    }

    if (page === 1) {
      afterPages += 2;
    } else if (page === 2) {
      afterPages += 1;
    }

    if (page === pages) {
      beforePages -= 2;
    } else if (page === pages - 1) {
      beforePages -= 1;
    }

    for (let p = beforePages; p <= afterPages; p++) {
      if (p === 0) {
        p += 1;
      }
      if (p > pages) {
        continue;
      }
      active = page == p ? "active-govco" : "no";
      liTag += `<li class="page-item-govco number-govco ${active}"><a href="javascript:void(0)" onclick="_dibujarElementos(${pages}, ${p})">${p}</a></li>`;
    }

    if (page < pages - 1) {
      if (page < pages - 2) {
        liTag += `<li class="page-item-govco dots-govco"><a>...</a></li>`;
      }
      liTag += `<li class="page-item-govco number-govco no"><a href="javascript:void(0)" onclick="_dibujarElementos(${pages}, ${pages})">${pages}</a></li>`;
    }
  }

  if (page < pages) {
    liTag += `<li class="page-item-govco next-page-govco"><a href="javascript:void(0)" onclick="_dibujarElementos(${pages}, ${page + 1})"><span class="next-page-icon-govco"></span><span class="next-page-text-govco">Siguiente</span></a></li>`;
  } else if (page == pages) {
    liTag += `<li class="page-item-govco next-page-govco disabled-govco"><a href="javascript:void(0)"><span class="next-page-icon-govco"></span><span class="next-page-text-govco">Siguiente</span></a></li>`;
  }
  document.getElementById("lista-paginador").innerHTML = liTag;
  return liTag;
}
function __dibujarElementos(pages, page, route) {
  location.href = route + '?page=' + page;
}
function renderDocumentosTable(documentos) {
  if (documentos.length === 0) {
    const documentosContainer = verMas.querySelector('#documentos-container');
    documentosContainer.style.display = 'block';
    documentosContainer.querySelector('tbody').innerHTML = '<tr><td colspan="1"><span>-- No se han cargado archivos --</span></td></tr>';
    return;
  }
  var table = verMas.querySelector('#documentos-table tbody');
  table.innerHTML = '';
  documentos.forEach((doc, index) => {
    var row = document.createElement('tr');
    var cell1 = document.createElement('td');
    cell1.textContent = expandAbbreviation(doc.tipo);
    var cell2 = document.createElement('td');
    cell1.style.setProperty('width', '315px', 'important');
    var button = document.createElement('button');
    button.type = 'button';
    button.className = 'btn-govco no-fill-btn-govco symbol-btn-govco mixed-btn-govco govco-download';
    button.innerHTML = '<span class="sub-btn-govco w-80">Descargar</span>';
    button.onclick = function () {
      window.open('/documentos/download/' + doc.id, '_blank');
    };
    cell2.appendChild(button);
    row.appendChild(cell1);
    row.appendChild(cell2);
    table.appendChild(row);
  });

}
function renderComentariosModal(trigger, modal) {
  const comentarios = JSON.parse(trigger.getAttribute('data-bs-comentarios'));
  const solicitud = JSON.parse(trigger.getAttribute('data-bs-id'));
  var comentariosContainer = modal.querySelector('#comentarios-container');
  comentariosContainer.innerHTML = '<p>Comentarios anteriores:</p>';
  modal.querySelector('form').setAttribute('action', `/solicitudes/${solicitud}/comentarios`);
  if (comentarios.length === 0) {
    comentariosContainer.style.display = 'none';
    return;
  }
  for (var i = 0; i < comentarios.length; i++) {
    var comentario = comentarios[i];
    var comentarioDiv = document.createElement('div');
    comentarioDiv.className = 'row py-2';
    const formattedDate = new Date(comentario.created_at).toLocaleString('es-ES', {
      day: '2-digit',
      month: '2-digit',
      year: 'numeric',
      hour: '2-digit',
      minute: '2-digit',
      hour12: false
    });
    comentarioDiv.innerHTML = `
    <strong>${formattedDate}</strong><br/>
    <span>${comentario.comentario}</span><br/>`;
    comentariosContainer.appendChild(comentarioDiv);
    setTimeout(() => {
      comentariosContainer.scrollTop = comentariosContainer.scrollHeight;
    }, 600);
  }
}
function expandAbbreviation(original) {
  const abbreviations = {
    'ID': 'Documento de Identidad',
    'PROPIEDAD': 'Tarjeta de propiedad del vehículo automotor',
    'FUN': 'Formato FUN',
    'PODER': 'Documento poder',
    'CONSTANCIA DE PAGO': 'Constancia de pago',
  };

  return abbreviations[original] || original;
}