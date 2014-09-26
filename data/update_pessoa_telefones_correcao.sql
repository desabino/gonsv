UPDATE pessoas
   SET telefone  = CASE WHEN length(telefone)  = 8 THEN concat('11', telefone)  ELSE telefone END,
       telefone2 = CASE WHEN length(telefone2) = 8 THEN concat('11', telefone2) ELSE telefone2 END,
       celular   = CASE WHEN length(celular)   = 9 THEN concat('11', celular)   ELSE celular END,
       celular2  = CASE WHEN length(celular2)  = 9 THEN concat('11', celular2)  ELSE celular2 END
 WHERE pessoa_id <> 500;

SELECT pessoa_id,
       nome,
       telefone,
       telefone2,
       celular,
       celular2
  FROM pessoas;