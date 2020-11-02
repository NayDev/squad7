SELECT
  *
FROM
  sosmedicamentos.denuncia;


SELECT
  den.id id,
  ubs.nome ubs,
  med.nome med,
  den.data_ocorrencia data
FROM
  denuncia den
  JOIN ubs ON den.ubs_id = ubs.id
  JOIN medicamento med ON den.medicamento_id = med.id;


SELECT
  adm.username username1,
  adm.email,
  adm.nome,
  adm.imagem userimg1,
  adm.adm_desde
FROM
  administrador adm;


SELECT
  ubs.*,
  count(den.ubs_id) qtde
FROM
  ubs
  LEFT JOIN denuncia den ON ubs.id = den.ubs_id
GROUP BY
  den.ubs_id
ORDER BY
  ubs.id DESC;