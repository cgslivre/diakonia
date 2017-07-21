SELECT * FROM 
((
  SELECT 
  DATE_FORMAT(e.data_hora_inicio,'%d/%m/%Y') AS data
  , e.data_hora_inicio
  , e.escala_musica_id 
  , CASE WHEN em.lider_id = 19 THEN 'escalado' ELSE 'nao-escalado' END AS escalado
  , 'antes' AS referencia
  FROM eventos e 
  INNER JOIN escalas_musica em
	ON e.escala_musica_id = em.id  
    AND e.data_hora_inicio < (SELECT data_hora_inicio FROM eventos WHERE id = 5)
  ORDER BY e.data_hora_inicio DESC
  LIMIT 5
) UNION
(
  SELECT 
  DATE_FORMAT(e.data_hora_inicio,'%d/%m/%Y') AS data
  , e.data_hora_inicio
  , e.escala_musica_id 
  , CASE WHEN em.lider_id = 19 THEN 'escalado' ELSE 'nao-escalado' END AS escalado
  , 'atual' AS referencia
  FROM eventos e 
  LEFT JOIN escalas_musica em
	ON e.escala_musica_id = em.id      
  WHERE e.id = 5
) UNION
(
  SELECT 
  DATE_FORMAT(e.data_hora_inicio,'%d/%m/%Y') AS data
  , e.data_hora_inicio
  , e.escala_musica_id 
  , CASE WHEN em.lider_id = 19 THEN 'escalado' ELSE 'nao-escalado' END AS escalado
  , 'antes' AS referencia
  FROM eventos e 
  INNER JOIN escalas_musica em
	ON e.escala_musica_id = em.id  
    AND e.data_hora_inicio > (SELECT data_hora_inicio FROM eventos WHERE escala_musica_id = 5)
  ORDER BY e.data_hora_inicio DESC
  LIMIT 5
)) AS S ORDER BY data_hora_inicio
