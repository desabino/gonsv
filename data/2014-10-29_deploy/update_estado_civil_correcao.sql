UPDATE pessoas AS p
   SET p.estado_civil = CASE WHEN p.estado_civil = 'solteiro(a)' THEN 1
							 WHEN p.estado_civil = 'casado(a)' THEN 2
							 WHEN p.estado_civil = 'união estável' THEN 6
                             ELSE p.estado_civil = p.estado_civil
					    END
 WHERE p.estado_civil <> 's';