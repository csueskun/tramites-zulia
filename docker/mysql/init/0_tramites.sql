INSERT INTO `tramites` (`id`, `nombre`, `descripcion`, `precio`, `created_at`, `updated_at`) VALUES (NULL, 'Traspaso de propiedad de un vehículo automotor', 'Este trámite asegura que el nuevo propietario sea reconocido como el responsable legal del vehículo, cumpliendo con las obligaciones civiles y fiscales, como el pago de impuestos, multas y otros compromisos asociados al automóvil', '225000', NULL, NULL);
INSERT INTO `tramites` (`id`, `nombre`, `descripcion`, `precio`, `created_at`, `updated_at`) VALUES (NULL, 'Levantamiento de limitacion o gravamen a un vehículo automotor', 'El proceso legal mediante el cual se elimina una restricción, impedimento o condición que afecta la libre disposición del vehículo. Este gravamen puede haber sido impuesto por diversas razones, y su levantamiento permite que el propietario del vehículo lo venda, transfiera o disponga de él sin restricciones legales', '60000', NULL, NULL);
INSERT INTO `tramites` (`id`, `nombre`, `descripcion`, `precio`, `created_at`, `updated_at`) VALUES (NULL, 'Certificado de libertad y tradicion de un vehículo automotor', 'El certificado de libertad y tradicion de un vehiculo automotor incluye la información como su historial de propietarios, estado de los impuestos, posibles embargos, u otras restricciones legales que puedan afectar a la propiedad', '133804', NULL, NULL);
INSERT INTO `tramites` (`id`, `nombre`, `descripcion`, `precio`, `created_at`, `updated_at`) VALUES (NULL, 'Duplicado de placas de un vehículo automotor', 'Destrucción, deterioro o hurto, las cuales permiten identificar externa y privativamente un vehículo', '118305', NULL, NULL);
INSERT INTO `tramites` (`id`, `nombre`, `descripcion`, `precio`, `created_at`, `updated_at`) VALUES (NULL, 'Renovación de licencia de conducción', 'Este proceso permite actualizar la vigencia del documento, certificando que la persona sigue apta para conducir un vehículo al cumplir con las normativas de tránsito, mantener las habilidades necesarias y/o contar con condiciones médicas adecuadas según los requisitos establecidos', '82502', NULL, NULL);


INSERT INTO `tramite_items` (`id`, `tramite_id`, `nombre`, `descripcion`, `precio`, `created_at`, `updated_at`) VALUES (NULL, '1', 'Derecho de trámite', '', '160200', NULL, NULL);
INSERT INTO `tramite_items` (`id`, `tramite_id`, `nombre`, `descripcion`, `precio`, `created_at`, `updated_at`) VALUES (NULL, '1', 'Sustrato lamina', '', '25000', NULL, NULL);
INSERT INTO `tramite_items` (`id`, `tramite_id`, `nombre`, `descripcion`, `precio`, `created_at`, `updated_at`) VALUES (NULL, '1', 'MT', '', '32600', NULL, NULL);
INSERT INTO `tramite_items` (`id`, `tramite_id`, `nombre`, `descripcion`, `precio`, `created_at`, `updated_at`) VALUES (NULL, '1', 'RUNT', '', '2100', NULL, NULL);

INSERT INTO `tramite_items` (`id`, `tramite_id`, `nombre`, `descripcion`, `precio`, `created_at`, `updated_at`) VALUES (NULL, '2', 'Derecho de trámite', '', '68404', NULL, NULL);
INSERT INTO `tramite_items` (`id`, `tramite_id`, `nombre`, `descripcion`, `precio`, `created_at`, `updated_at`) VALUES (NULL, '2', 'Sustrato lamina', '', '25000', NULL, NULL);
INSERT INTO `tramite_items` (`id`, `tramite_id`, `nombre`, `descripcion`, `precio`, `created_at`, `updated_at`) VALUES (NULL, '2', 'MT', '', '32600', NULL, NULL);
INSERT INTO `tramite_items` (`id`, `tramite_id`, `nombre`, `descripcion`, `precio`, `created_at`, `updated_at`) VALUES (NULL, '2', 'RUNT', '', '7800', NULL, NULL);

INSERT INTO `tramite_items` (`id`, `tramite_id`, `nombre`, `descripcion`, `precio`, `created_at`, `updated_at`) VALUES (NULL, '3', 'Derecho de trámite', '', '60000', NULL, NULL);

INSERT INTO `tramite_items` (`id`, `tramite_id`, `nombre`, `descripcion`, `precio`, `created_at`, `updated_at`) VALUES (NULL, '4', 'Derecho de trámite', '', '91205', NULL, NULL);
INSERT INTO `tramite_items` (`id`, `tramite_id`, `nombre`, `descripcion`, `precio`, `created_at`, `updated_at`) VALUES (NULL, '4', 'Sustrato lamina', '', '25000', NULL, NULL);
INSERT INTO `tramite_items` (`id`, `tramite_id`, `nombre`, `descripcion`, `precio`, `created_at`, `updated_at`) VALUES (NULL, '4', 'MT', '', '0', NULL, NULL);
INSERT INTO `tramite_items` (`id`, `tramite_id`, `nombre`, `descripcion`, `precio`, `created_at`, `updated_at`) VALUES (NULL, '4', 'RUNT', '', '2100', NULL, NULL);

INSERT INTO `tramite_items` (`id`, `tramite_id`, `nombre`, `descripcion`, `precio`, `created_at`, `updated_at`) VALUES (NULL, '5', 'Derecho de trámite', '', '22802', NULL, NULL);
INSERT INTO `tramite_items` (`id`, `tramite_id`, `nombre`, `descripcion`, `precio`, `created_at`, `updated_at`) VALUES (NULL, '5', 'Sustrato lamina', '', '25000', NULL, NULL);
INSERT INTO `tramite_items` (`id`, `tramite_id`, `nombre`, `descripcion`, `precio`, `created_at`, `updated_at`) VALUES (NULL, '5', 'MT', '', '32600', NULL, NULL);
INSERT INTO `tramite_items` (`id`, `tramite_id`, `nombre`, `descripcion`, `precio`, `created_at`, `updated_at`) VALUES (NULL, '5', 'RUNT', '', '2100', NULL, NULL);
