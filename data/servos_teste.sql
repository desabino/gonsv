-- SELECT * FROM sabino_dev_gonsv.servos;

SELECT p.nome,
       p.data_nasc,
       m.ministerio_nome,
       sm.ativo
  FROM sabino_dev_gonsv.servos AS s
 INNER JOIN sabino_dev_gonsv.pessoas AS p ON p.pessoa_id = s.pessoa_id
 INNER JOIN sabino_dev_gonsv.servo_ministerio AS sm ON sm.servo_id = s.servo_id
 INNER JOIN sabino_dev_gonsv.ministerios AS m ON m.ministerio_id = sm.ministerio_id;