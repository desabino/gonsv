/*
SELECT pessoa_id,
       nome,
       CASE batizado WHEN 0 THEN 'N'
                     WHEN 1 THEN 'S'
                     ELSE null END AS batizado,
       CASE catequese WHEN 0 THEN 'N'
                     WHEN 1 THEN 'S'
                     ELSE null END AS catequese,
       CASE crisma WHEN 0 THEN 'N'
                     WHEN 1 THEN 'S'
                     ELSE null END AS crisma,
       CASE participou_go_rcc WHEN 0 THEN 'N'
                     WHEN 1 THEN 'S'
                     ELSE null END AS participou_go_rcc
  FROM pessoas
*/

UPDATE pessoas
       SET
       batizado = CASE WHEN batizado = 0 THEN 'N'
                       WHEN batizado = 1 THEN 'S'
                       ELSE batizado = null END,
       catequese = CASE WHEN catequese = 0 THEN 'N'
                        WHEN catequese = 1 THEN 'S'
                        ELSE catequese = null END,
       crisma = CASE WHEN crisma = 0 THEN 'N'
                     WHEN crisma = 1 THEN 'S'
                     ELSE crisma = null END,
       participou_go_rcc = CASE WHEN participou_go_rcc = 0 THEN 'N'
                                WHEN participou_go_rcc = 1 THEN 'S'
                                ELSE participou_go_rcc = null END;