SELECT * FROM (
(
  SELECT 
  DATE_FORMAT(e.data_hora_inicio,'%d/%m/%Y') AS data
  , e.data_hora_inicio
  , e.escala_musica_id 
  , CASE 
	  WHEN em.lider_id = 19 THEN 'lider'
      WHEN (SELECT COUNT(1) 
      FROM tarefas_escala_musica t 
	  WHERE t.escala_id = e.escala_musica_id
      AND t.colaborador_id = 19) > 0 THEN 'escalado'
      ELSE 'nao-escalado' END AS escalado  
  , 'antes' AS referencia
  FROM eventos e 
  INNER JOIN escalas_musica em
	ON e.escala_musica_id = em.id  
    AND e.data_hora_inicio < NOW()
  ORDER BY e.data_hora_inicio DESC
  LIMIT 5
) UNION
(
SELECT 
  DATE_FORMAT(e.data_hora_inicio,'%d/%m/%Y') AS data
  , e.data_hora_inicio
  , e.escala_musica_id 
  , CASE 
	  WHEN em.lider_id = 19 THEN 'lider'
      WHEN (SELECT COUNT(1) 
      FROM tarefas_escala_musica t 
	  WHERE t.escala_id = e.escala_musica_id
      AND t.colaborador_id = 19) > 0 THEN 'escalado'
      ELSE 'nao-escalado' END AS escalado  
  , 'depois' AS referencia
  FROM eventos e 
  INNER JOIN escalas_musica em
	ON e.escala_musica_id = em.id  
    AND e.data_hora_inicio > NOW()
  ORDER BY e.data_hora_inicio DESC
  LIMIT 5
) ) AS S ORDER BY data_hora_inicio