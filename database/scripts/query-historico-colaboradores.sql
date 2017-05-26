SELECT * FROM (
(SELECT 
  DATE_FORMAT(e.data_hora_inicio,'%d/%m/%Y') AS data
  , e.data_hora_inicio
  , e.escala_musica_id 
  , CASE WHEN (SELECT COUNT(1) 
      FROM tarefas_escala_musica t 
	  WHERE t.escala_id = e.escala_musica_id
      AND t.colaborador_id = 19) > 0 THEN 'E' ELSE 'NE' END AS escalado
  , 'antes' AS referencia
  FROM eventos e 
  WHERE e.escala_musica_id IS NOT NULL
    AND e.data_hora_inicio < (SELECT data_hora_inicio FROM eventos WHERE escala_musica_id = 5)
  ORDER BY e.data_hora_inicio DESC
  LIMIT 5
  )
UNION
(
SELECT
	DATE_FORMAT(e.data_hora_inicio,'%d/%m/%Y') AS data
    , e.data_hora_inicio
    , e.escala_musica_id
    , CASE WHEN (SELECT COUNT(1) 
      FROM tarefas_escala_musica t 
	  WHERE t.escala_id = 1
      AND t.colaborador_id = 19) > 0 THEN 'E' ELSE 'NE' END AS escalado
	, 'atual' AS referencia
FROM eventos e
WHERE e.escala_musica_id = 5
)
UNION
(
SELECT 
  DATE_FORMAT(e.data_hora_inicio,'%d/%m/%Y') AS data
  , e.data_hora_inicio
  , e.escala_musica_id 
  , CASE WHEN (SELECT COUNT(1) 
      FROM tarefas_escala_musica t 
	  WHERE t.escala_id = e.escala_musica_id
      AND t.colaborador_id = 19) > 0 THEN 'E' ELSE 'NE' END AS escalado
  , 'depois' AS referencia
  FROM eventos e 
  WHERE e.escala_musica_id IS NOT NULL
    AND e.data_hora_inicio > (SELECT data_hora_inicio FROM eventos WHERE escala_musica_id = 5)
  ORDER BY e.data_hora_inicio
  LIMIT 5
  ) 
) AS C ORDER BY data_hora_inicio