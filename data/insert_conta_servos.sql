SELECT p.pessoa_id, p.nome, p.email
  FROM pessoas AS p
 INNER JOIN servos AS s ON s.pessoa_id = p.pessoa_id
  ORDER BY nome;

INSERT INTO conta(pessoa_id, nome, email, senha, tipo)
	 SELECT p.pessoa_id, p.nome, p.email, sha1('123456'), 3
	   FROM pessoas AS p
	  INNER JOIN servos AS s ON s.pessoa_id = p.pessoa_id;

SELECT * FROM conta;

UPDATE conta SET tipo = 2 WHERE conta_id in(135, 129);
UPDATE conta SET tipo = 1 WHERE conta_id in(134);