-- SELECT pessoa_id, nome, email, newsletter FROM pessoas WHERE email <> '' ORDER BY nome;

UPDATE pessoas AS p
   SET p.newsletter = 1
 WHERE p.email
	IN (
	'acruz.cnsp@infraero.gov.br',
	'ademirtele@hotmail.com',
	'adri.as2010@gmail.com',
	'alinedfn@hotmail.com',
	'analiastela@yahoo.com.br',
	'andreza@lufan.com.br',
	'angela_baile@live.com',
	'antoniolaureano@hotmail.com',
	'blodigo26@gmail.com',
	'carolmca@msn.com',
	'carolzinha2015@hotmail.com',
	'chrisstar@ig.com.br',
	'damiao_dantas@ig.com.br',
	'dbnoieder@aatbrasil.com.br',
	'de_ssabino@yahoo.com.br',
	'didho_38@hotmail.com',
	'didito_3g@hotmail.com',
	'ec.iorio@gmail.com',
	'edgaraugusto18@yahoo.com.br',
	'edubrussi@globo.com',
	'elainepirola@globo.com',
	'elaine_goulart@globo.com',
	'fabianacruzcruz@yahoo.com.br',
	'fatimalima.rs@hotmail.com',
	'ffbbastos@uol.com.br',
	'gabriella_mbarros@yahoo.com.br',
	'galganiac@hotmail.com',
	'giseleflorencio-fisioterapeuta@gmail.com',
	'giseleflorencio.fisioterapeuta@gmail.com',
	'giseleflorencio_fisioterapeuta@gmail.com',
	'gladysnb1964@hotmail.com',
	'gomesjuci@hotmail.com',
	'hanassad.1@hotmail.com',
	'japa.mesquita@gmail.com',
	'jp_pf@hotmail.com',
	'karenrara@gmail.com',
	'karla_oliveira22@yahoo.com.br',
	'ksmadureira@uol.com.br',
	'lourdespsiha@hotmail.com',
	'lourdespsilva@hotmail.com',
	'lourdessouza2@hotmail.com',
	'lucienesolera@yahoo.com.br',
	'm.dilma2010@hotmail.com',
	'marcelina08@hotmail.com',
	'martha.profili@terra.com.br',
	'michell.musadis@gmail.com',
	'nanninirc@hotmail.com',
	'oliveirahy@yahoo.com.br',
	'oliveiray@yahoo.com.br',
	'paipuc@yahoo.com.br',
	'paulo.pfg01@gmail.com',
	'rafaelamferrari@gmail.com',
	'relusampaio@hotmail.com',
	'robertomferrari@gmail.com',
	'rosanavidasaudavel@gmail.com',
	'sandra.cris2@bol.com.br',
	'talitta_nasc@yahoo.com.br',
	'toledo@feinkost.com.br',
	'valeriafuentislima@hotmail.com',
	'vallimabs@hotmail.com'
	);