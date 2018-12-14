
<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
?>

<?php echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>" . PHP_EOL; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="script.js"></script>
	<script type="text/javascript">
	function clx(str, obj) {
		let variable = "#" + str + "-text";
		$('.hide').not(variable).hide();
		$(obj).addClass("galleryframe-active");
		$(variable).fadeToggle("slow");
	}
	</script>
	<title>Home - Colli Digitali</title>
</head>
<body>
	<div id="container">
		<div class="header">
			<div class="header-picture">
				<div class="header-title">
					<h1>Colli Euganei</h1>
					<h2>Natura e storia in digitale</h2>
				</div>
			</div>
		</div>
		<div class="topnav-bar">
			<ul class="topnav">
				<li><a href="index.php" class="active">Home</a></li>
				<li><a href="geografia.php">Geografia</a></li>
				<li><a href="clima.php">Clima</a></li>
				<li><a href="storia.php">Storia</a></li>
				<li class="dropdown"><a href="luoghi.php">Luoghi</a>
					<ul class="dropdown-content">
						<li><a href="luoghi/chiesette.php">7 Chiesette</a></li>
						<li><a href="luoghi/catajo.php">Castello del Catajo</a></li>
						<li><a href="luoghi/praglia.php">Abbazia di Praglia</a></li>
						<li><a href="luoghi/carrareseeste.php">Castello carrarese di Este</a></li>
						<li><a href="luoghi/lispida.php">Castello di Lispida</a></li>
						<li><a href="luoghi/pelagio.php">Castello San Pelagio</a></li>
					</ul>
				</li>
				<li><a href="gite.php">Gite</a></li>
				<?php if(isset($_SESSION['username'])): ?>
					<li><a href="view-account.php">Account</a></li>
					<?php else: ?>
						<li><a href="login.php">Accedi</a></li>
						<li><a href="Registrazione.php">Registrati</a></li>
					<?php endif; ?>
					<li class="icon">
						<a href="javascript:void(0);" onclick="menuMobile()">&#9776;</a>
					</li>
				</ul>
			</div>
			<div class="content">
				<ul class="breadcrumb">
					<li><a href="index.php">Home</a></li>
				</ul>
				<h2>Benvenuto nei Colli Euganei</h2>
				<div class="section">
					<p class="text">
						Percorri uno dei sentieri del parco regionale, ammira antiche ville come il castello del Catajo o luoghi di pellegrinaggio come il viale
						delle 7 chiesette. Visita i colli euganei, scopri come natura, storia e cultura possono fondersi e dar vita ad un magnifico territorio.
					</p>
				</div>
				<div class="gallery">
					<div class="galleryframe">
						<ul>
							<li><img class="pic" src="assets/img/geog.jpg" alt="" /></li>
							<li><a class="gallery-title" href="javascript:void(0)" onclick="clx('geografia')">Geografia</a></li>
							<li>Scopri la geografia del territorio e come si &egrave; formato.</li>
						</ul>
					</div>
					<div class="galleryframe">
						<ul>
							<li><img class="pic" src="assets/img/clima.jpg" alt="" /></li>
							<li><a class="gallery-title" href="javascript:void(0)" onclick="clx('clima')">Clima</a></li>
							<li>Scopri come il territorio si presenta nel corso dell'anno.</li>
						</ul>
					</div>
					<div class="galleryframe" onclick="clx('storia', this)">
						<ul>
							<li><img class="pic" src="assets/img/storia.jpg" alt="Immagine Rocca di Monselice" /></li>
							<li><a class="gallery-title" href="javascript:void(0)" >Storia</a></li>
							<li>Scopri la storia, la cultura e l'arte del territorio</li>
						</ul>
					</div>
				</div>
				<div id="clima-text" class="hide">
					<h2>Il Clima</h2>
					<p class="text">I colli euganei, trovandosi nel cuore della pianura padana, godono di un clima di tipo continentale,
						con inverni freddi ed estati calde ed umide. La presenza delle colline per&ograve da luogo a fenomeni interessanti e particolari
						e a panorami di rara bellezza.
						<div class="floatright">
							<img class="pic climapic" id="invernopic"src="assets/img/inverno.jpg" alt="" width="512" height="332">
						</div>
						<h2>Autunno e Inverno</h2>
						<p class="text">
							L'autunno e l'inverno dei colli euganei sono caratterizzati dalla nebbia. Poich&egrave la nebbia raramente supera i 200 metri sul livello del mare
							spesso le cime dei colli ne sono al di sopra dando luogo a paesaggi mozzafiato. L'esposizione al sole inoltre fa si che le cime delle colline
							presentino temperature pi&ugrave alte rispetto alla pianura immersa nella nebbia. D'inverno la neve contrasta con gli interni caldi di trattorie e case
							che risultano ancora pi&ugrave accoglienti e confortevoli.
						</p>

						<div class="floatright">
							<img class="pic climapic" src="assets/img/primavera.jpg" alt="" width="512" height="332">
						</div>
						<h2>Primavera ed Estate</h2>
						<p class="text">
							In primavera i colli si riempiono di colori: i boschi di robinia, le piante di ginestra e le rute padovane contribuiscono con i colori bianco, arancione e giallo
							insieme ai prati e alle chiome degli alberi verdi a formare un quadro allegro e vitale.
							D'estate le colline offrono ombra e vento contro le temperature e l'umidit&agrave tipiche della pianura padana.
						</p>
					</div>
					<div id="geografia-text" class="hide">
						<h2>Geografia e Geologia dei colli</h2>
						<p class="text">I colli euganei sono un gruppo di rilievi di altezza che varia tra i 300 e i 600 metri,
							situati a sud ovest di padova. I colli catturano particolarmente l'attenzione poich&egrave si stagliano
							isolati nel cuore della pianura veneta. Per proteggere il territorio e valorizzarne le qualit&agrave turistiche, fu istituito nel 1989 il parco regionale dei colli euganei, il primo della regione Veneto.
						</p>
						<h2>Origine dei colli</h2>
						<div class="floatright" id="geotab">
							<table class="tg">
								<tr>
									<th class="tg-jp7n">Periodo</th>
									<th class="tg-jp7n">Rocce</th>
								</tr>
								<tr>
									<td class="tg-ai30">Oligocene</td>
									<td class="tg-2fdn">Vulcaniti differenziate</td>
								</tr>
								<tr>
									<td class="tg-aphi" rowspan="2">Eocene</td>
									<td class="tg-107g">Marne euganee<br></td>
								</tr>
								<tr>
									<td class="tg-2fdn">Vulcaniti basaltiche</td>
								</tr>
								<tr>
									<td class="tg-hd3d" rowspan="2">Cretaceo</td>
									<td class="tg-2fdn">Scaglia rossa</td>
								</tr>
								<tr>
									<td class="tg-2fdn">Biancone</td>
								</tr>
								<tr>
									<td class="tg-bqpl" rowspan="2"><br>Giurassico</td>
									<td class="tg-2fdn">Rosso ammonitico</td>
								</tr>
								<tr>
									<td class="tg-2fdn">Calcari grigi</td>
								</tr>
								<tr>
									<td class="tg-ue2u" rowspan="2">Triassico</td>
									<td class="tg-2fdn">Dolomia principale</td>
								</tr>
								<tr>
									<td class="tg-2fdn">Vulcaniti basiche</td>
								</tr>
							</table>
						</div>
						<p class="text">
							I colli sono di origine vulcanica: circa 30 milioni di anni fa il territorio che oggi costituisce la pianura padana era
							un fondale marino. In questo contesto i colli sono nati in seguito ad eruzioni sottomarine che hanno depositato lava sul fondale marino.
							In seguito, le stesse tensioni nelle crosta terrestre che hanno innalzato la catena montuosa delle alpi ha sollevato la pianura veneta e con
							essa i colli. A testimonianza di questi eventi, ancora oggi &egrave possibile trovare in una fenditura del Monte Resino fossili di ammoniti, animali
							marini dotati di conchiglia esterna a forma di spirale.
						</p>
						<h2>Geologia</h2>
						<p class="text">
							Le roccie che si incontrano percorrendo i sentieri dei colli sono di fondamental importanza per comprenderne la storia.
							Le roccie pi&ugrave chiare sono di natura calcarea, si tratta di roccie sedimentarie databili a quando la pianura padana giaceva sul fondale marino.
							Il pi&ugrave antico tipo di roccia trovato sui colli euganei &egrave chiamato Rosso ammonitico per via del suo colore e perch&egrave contiene al suo interno fossili di ammoniti.
							Questa roccia risale al periodo che va dai 150 ai 135 milioni di anni fa.
							Pi&ugrave recente &egrave invece la roccia chiamata Biancone per via del colore bianco, che risale fino ai 90 milioni di anni fa.
							Il calcare contenuto in queste roccie ha origine nei gusci di minuscoli microorganismi che sono visibili al microscopio.
							Risalente fino a 55 milioni di anni fa troviamo la Scaglia rossa, che &egrave sempre un tipo di roccia calcarea che per&ograve presenta un abbondanza di fossili di ricci di mare e denti di squalo.
							Infine il pi&ugrave recente strato di roccia formatosi &egrave di colore verde-grigiastro e prende il nome di Marna euganea.
						</p>
						<h2>Flora & Fauna</h2>
						<p class="text">
							Il terreno ha un enorme influenza sulla flora del parco, pertanto in base al terreno incontreremo vegetazione diversa.
							Mentre la parte meridionale dei colli &egrave caratterizzata da zone prative e boschi di querce, il lato nord dei colli &egrave caratterizzato da
							vegetazione della macchia mediterranea. Altri alberi comuni sui colli sono il castagno e la robinia.
							Prevalentemente la fauna dei colli euganei &egrave composta da piccoli mammiferi come lepri, cinghiali, volpi, tassi e faine.
							La presenza di piccoli mammiferi come lepri ed altri roditori offre una nicchia ecologica ad uccelli rapaci come falchi e civette.
							Infine vi &egrave un abbondanza di anfibi e rettili tra cui il ramarro, una splendida lucertola lunga fino a 45 cm di colore verde per eccezione del mento che &egrave di colore blu acceso e la rara
							testugine dei colli euganei, un adattamento particolare ai colli della testugine palustre europea.
						</p>
					</div>
					<div id="storia-text" class="hide">
						<h2>Una commistione di storia, arte e cultura.</h2>
						<p class="text">I colli prendono il nome dal primo popolo che in epoca preistorica visse in Veneto: gli euganei.
							La storia millenaria dei colli ci dona oggi siti archeologici, antichi palazzi, musei e monumenti dal valore inestimabile.
						</p>
						<h2>Storia di popoli</h2>
						<div class="floatright">
							<img class="pic storiapic" src="assets/img/atestino.jpg" alt=""/>
						</div>
						<p class="text">
							Dopo gli antichi Euganei, primi abitanti della zona, fu la volta dei Veneti le cui testimonianze &egrave possibile ammirare
							sotto forma di reperti nel Museo Nazionale Atestino di Este, che ospita reperti tra cui vestiti, utensili ed armi risalenti dalla preistoria fino all'et&agrave Romana.
							E proprio all'et&agrave Romana risalgono i primi paesi, preceduti da un villagio palustre sul lago della Costa.
							Con il medioevo la posizione strategica dei colli venne sfruttata per la costruzione di castelli, mura, fortificazioni che ancora oggi sono apprezzabili nella
							loro imponenza. Le ville venete invece risalgono al quindicesimo secolo, quando la Serenissima, repubblica di venezia, assunse il controllo del territorio.
							Giungendo ai giorni nostri, l'incremento dello sfruttamento del territorio ha indotto la regione a creare nel 1989 il parco regionale dei colli euganei
							con lo scopo di preservare il territorio e valorizzarne le qualit&agrave, dai reperti, ai castelli, alle maestose ville, alla natura incontaminata.
						</p>
						<h2>Il patrimonio culturale</h2>
						<p class="text">
							I centri storici pi&ugrave importanti come Este culla della civilt&agrave
							Paleoveneta, Arqu&agrave Petrarca incantevole borgo medievale e Monselice
							scenografica citt&agrave murata offrono mete imperdibili per gli appasionati di storia ed arte.
							Oltre ai centri storici meravigliose sono le ville venete  come Villa Vescovi a Torreglia
							e Villa Barbarigo a Galzignano, e i suggestivi monasteri di Praglia e del
							Rua, dove il tempo sembra si sia fermato per offrire ai visitatori momenti di profonda
							pace spirituale.
						</p>
						<h2>L'arte</h2>
						<div class="floatright">
							<img class="pic storiapic" src="assets/img/filmfestival.jpg" alt="" />
						</div>
						<p class="text">
							Per gli amanti dell'arte, mete imperdibili sono i musei come il gi&agrave citato Museo Nazionale Atestino di Este, ma soprattutto le ville
							come il castello del Catajo, che con i loro affreschi e l'architettura costituiscono un patrimonio dal valore inestimabile.
							I colli per&ograve non offrono soltanto occasioni di apprezzare l'arte dell'antichit&agrave ma anche di ammirare nuove opere d'arte:
							dall'Euganea Film Festival, al festival della land art, i colli euganei continuano ad ospitare ed ispirare artisti anche oggi.
						</p>
					</div>
				</div>
				<?php include_once('footer.php'); ?> 
			</div>
		</body>
		</html>
