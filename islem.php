<?php 
ob_start();
session_start();
include "baglan.php";

if (isset($_POST["giris"])) {

	$kulladi=$_POST['kulladi'];
	$kullpass=md5($_POST['kullpass']);
	

	if ($kulladi && $kullpass) {
		
		$kullanicisor=$db->prepare("SELECT * FROM user WHERE kulladi=:kulladi AND kullpass=:kullpass");
		$kullanicisor->execute(array(
			'kulladi'=>$kulladi,
			'kullpass'=>$kullpass

		));
		$say=$kullanicisor->rowCount();

		if ($say>0) {
			$_SESSION['kulladi']=$kulladi;
			header("Location:admin/production/index.php");

		}else {
			header("Location:admin/production/login.php?durum=no");
		}


	}
	



}


if (isset($_POST["genelayarguncelle"])) {
	
	$esitle=$db->prepare("UPDATE ayarlar SET

		ayar_siteurl=:ayar_siteurl,
		ayar_title=:ayar_title,
		ayar_description=:ayar_description,
		ayar_keywords=:ayar_keywords,
		ayar_author=:ayar_author
		WHERE id=0");

	$guncelle=$esitle->execute(array(

		'ayar_siteurl' =>$_POST['ayar_siteurl'],
		'ayar_title' =>$_POST['ayar_title'],
		'ayar_description' =>$_POST['ayar_description'],
		'ayar_keywords' =>$_POST['ayar_keywords'],
		'ayar_author' =>$_POST['ayar_author']


	));

	if ($guncelle) {
		header("Location:admin/production/genel-ayar.php?durum=ok");
	}

	else {
		header("Location:admin/production/genel-ayar.php?durum=no");
	}

}

if (isset($_POST["iletisimayarguncelle"])) {
	
	$esitle=$db->prepare("UPDATE ayarlar SET

		ayar_tel=:ayar_tel,
		ayar_gsm=:ayar_gsm,
		ayar_faks=:ayar_faks,
		ayar_mail=:ayar_mail,
		ayar_adres=:ayar_adres,
		ayar_ilce=:ayar_ilce,
		ayar_il=:ayar_il,
		ayar_mesai=:ayar_mesai
		WHERE id=0");

	$guncelle=$esitle->execute(array(

		'ayar_tel' =>$_POST['ayar_tel'],
		'ayar_gsm' =>$_POST['ayar_gsm'],
		'ayar_faks' =>$_POST['ayar_faks'],
		'ayar_mail' =>$_POST['ayar_mail'],
		'ayar_adres' =>$_POST['ayar_adres'],
		'ayar_ilce' =>$_POST['ayar_ilce'],
		'ayar_il' =>$_POST['ayar_il'],
		'ayar_mesai' =>$_POST['ayar_mesai']



	));

	if ($guncelle) {
		header("Location:admin/production/iletisim-ayar.php?durum=ok");
	}

	else {
		header("Location:admin/production/iletisim-ayar.php?durum=no");
	}

}

if (isset($_POST["sosyalayarguncelle"])) {
	
	$esitle=$db->prepare("UPDATE ayarlar SET

		ayar_facebook=:ayar_facebook,
		ayar_twitter=:ayar_twitter,
		ayar_youtube=:ayar_youtube,
		ayar_google=:ayar_google
		WHERE id=0");

	$guncelle=$esitle->execute(array(

		'ayar_facebook' =>$_POST['ayar_facebook'],
		'ayar_twitter' =>$_POST['ayar_twitter'],
		'ayar_youtube' =>$_POST['ayar_youtube'],
		'ayar_google' =>$_POST['ayar_google']



	));

	if ($guncelle) {
		header("Location:admin/production/sosyal-ayar.php?durum=ok");
	}

	else {
		header("Location:admin/production/sosyal-ayar.php?durum=no");
	}

}

if (isset($_POST["apiayarguncelle"])) {
	
	$esitle=$db->prepare("UPDATE ayarlar SET

		ayar_recapctha=:ayar_recapctha,
		ayar_googlemaps=:ayar_googlemaps,
		ayar_analystic=:ayar_analystic
		WHERE id=0");

	$guncelle=$esitle->execute(array(

		'ayar_recapctha' =>$_POST['ayar_recapctha'],
		'ayar_googlemaps' =>$_POST['ayar_googlemaps'],
		'ayar_analystic' =>$_POST['ayar_analystic']


	));

	if ($guncelle) {
		header("Location:admin/production/api-ayar.php?durum=ok");
	}

	else {
		header("Location:admin/production/api-ayar.php?durum=no");
	}

}

if (isset($_POST["mailayarguncelle"])) {
	
	$esitle=$db->prepare("UPDATE ayarlar SET

		ayar_smtphost=:ayar_smtphost,
		ayar_smtpuser=:ayar_smtpuser,
		ayar_smtppassword=:ayar_smtppassword,
		ayar_smtpport=:ayar_smtpport
		WHERE id=0");

	$guncelle=$esitle->execute(array(

		'ayar_smtphost' =>$_POST['ayar_smtphost'],
		'ayar_smtpuser' =>$_POST['ayar_smtpuser'],
		'ayar_smtppassword' =>$_POST['ayar_smtppassword'],
		'ayar_smtpport' =>$_POST['ayar_smtpport']



	));

	if ($guncelle) {
		header("Location:admin/production/mail-ayar.php?durum=ok");
	}

	else {
		header("Location:admin/production/mail-ayar.php?durum=no");
	}

}

if (isset($_POST["hakkimizdaguncelle"])) {
	
	$esitle=$db->prepare("UPDATE hakkimizda SET

		baslik=:baslik,
		icerik=:icerik,
		video=:video,
		misyon=:misyon,
		vizyon=:vizyon
		WHERE id=0");

	$guncelle=$esitle->execute(array(

		'baslik' =>$_POST['baslik'],
		'icerik' =>$_POST['icerik'],
		'video' =>$_POST['video'],
		'misyon' =>$_POST['misyon'],
		'vizyon' =>$_POST['vizyon']


	));

	if ($guncelle) {
		header("Location:admin/production/hakkimizda.php?durum=ok");
	}

	else {
		header("Location:admin/production/hakkimizda.php?durum=no");
	}

}

if (isset($_POST["sliderkaydet"])) {

	$uploads_dir="img/uploaads";

	@$tmp_name=$_FILES['yol']['tmp_name'];
	@$name=$_FILES['yol']['name'];
	$random1=rand(20000,32000);
	$random2=rand(20000,32000);
	$random3=rand(20000,32000);
	$random4=rand(20000,32000);
	$randomad=$random1.$random2.$random3.$random4;
	$refimgyol=substr($uploads_dir, 4)."/".$randomad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$randomad$name");


	
	$esitle=$db->prepare("insert into slider SET

		ad=:ad,
		link=:link,
		sira=:sira,
		durum=:durum,
		yol=:yol
		
		");

	$guncelle=$esitle->execute(array(

		'ad' =>$_POST['ad'],
		'link' =>$_POST['link'],
		'sira' =>$_POST['sira'],
		'durum' =>$_POST['durum'],
		'yol' =>$refimgyol
		


	));

	if ($guncelle) {
		header("Location:admin/production/slider.php?durum=ok");
	}

	else {
		header("Location:admin/production/slider.php?durum=no");
	}

}


if ($_GET['slidersil']=="ok") {
	
	$sil=$db->prepare("DELETE FROM slider WHERE id=:id");

	$check=$sil->execute(array(

		'id' =>$_GET['id']

	));


	if ($check) {
		header("Location:admin/production/slider.php?durum=ok");
	}

	else {
		header("Location:admin/production/slider.php?durum=no");
	}
}

if (isset($_POST["haberekle"])) {

	if ($_FILES['resim']['size']>0) {
		



		$uploads_dir="img/uploaads";

		@$tmp_name=$_FILES['resim']['tmp_name'];
		@$name=$_FILES['resim']['name'];
		$random1=rand(20000,32000);
		$random2=rand(20000,32000);
		$random3=rand(20000,32000);
		$random4=rand(20000,32000);
		$randomad=$random1.$random2.$random3.$random4;
		$refimgyol=substr($uploads_dir, 4)."/".$randomad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$randomad$name");



		$esitle=$db->prepare("insert into haberler SET

			baslik=:baslik,
			detay=:detay,
			zaman=:zaman,
			keyword=:keyword,
			durum=:durum,
			resim=:resim

			");

		$guncelle=$esitle->execute(array(

			'baslik' =>$_POST['baslik'],
			'detay' =>$_POST['detay'],
			'zaman' =>$_POST['zaman'],
			'keyword' =>$_POST['keyword'],
			'durum' =>$_POST['durum'],
			'resim' =>$refimgyol



		));

		if ($guncelle) {
			header("Location:admin/production/haberler.php?durum=ok");
		}

		else {
			header("Location:admin/production/haberler.php?durum=no");
		}

	} else {
		$esitle=$db->prepare("insert into haberler SET

			baslik=:baslik,
			detay=:detay,
			zaman=:zaman,
			keyword=:keyword,
			durum=:durum


			");

		$guncelle=$esitle->execute(array(

			'baslik' =>$_POST['baslik'],
			'detay' =>$_POST['detay'],
			'zaman' =>$_POST['zaman'],
			'keyword' =>$_POST['keyword'],
			'durum' =>$_POST['durum']




		));

		if ($guncelle) {
			header("Location:admin/production/haberler.php?durum=ok");
		}

		else {
			header("Location:admin/production/haberler.php?durum=no");
		}
	}

}

if (isset($_POST["haberguncelle"])) {

	if ($_FILES['resim']['size']>0) {

		$uploads_dir="img/uploaads";

		@$tmp_name=$_FILES['resim']['tmp_name'];
		@$name=$_FILES['resim']['name'];
		$random1=rand(20000,32000);
		$random2=rand(20000,32000);
		$random3=rand(20000,32000);
		$random4=rand(20000,32000);
		$randomad=$random1.$random2.$random3.$random4;
		$refimgyol=substr($uploads_dir, 4)."/".$randomad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$randomad$name");


		$id=$_POST['id'];
		$esitle=$db->prepare("update haberler SET

			baslik=:baslik,
			detay=:detay,
			zaman=:zaman,
			keyword=:keyword,
			durum=:durum,
			resim=:resim


			where id=$id;

			");

		$guncelle=$esitle->execute(array(

			'baslik' =>$_POST['baslik'],
			'detay' =>$_POST['detay'],
			'zaman' =>$_POST['zaman'],
			'keyword' =>$_POST['keyword'],
			'durum' =>$_POST['durum'],
			'resim' =>$refimgyol



		));

		if ($guncelle) {
			header("Location:admin/production/haber-duzenle.php?id=$id&durum=ok");
		}

		else {
			header("Location:admin/production/haber-duzenle.php?id=$id&durum=no");
		}

	} else {
		$id=$_POST['id'];
		$esitle=$db->prepare("update haberler SET

			baslik=:baslik,
			detay=:detay,
			zaman=:zaman,
			keyword=:keyword,
			durum=:durum

			where id=$id;

			");

		$guncelle=$esitle->execute(array(

			'baslik' =>$_POST['baslik'],
			'detay' =>$_POST['detay'],
			'zaman' =>$_POST['zaman'],
			'keyword' =>$_POST['keyword'],
			'durum' =>$_POST['durum']




		));

		if ($guncelle) {
			header("Location:admin/production/haber-duzenle.php?id=$id&durum=ok");
		}

		else {
			header("Location:admin/production/haber-duzenle.php?id=$id&durum=no");
		}
	}

}

if ($_GET['habersil']=="ok") {

	$sil=$db->prepare("DELETE FROM haberler WHERE id=:id");

	$check=$sil->execute(array(

		'id' =>$_GET['id']

	));


	if ($check) {
		header("Location:admin/production/haberler.php?durum=ok");
	}

	else {
		header("Location:admin/production/haberler.php?durum=no");
	}
}

if (isset($_POST["menukaydet"])) {





	$esitle=$db->prepare("insert into menu SET

		ust=:ust,
		ad=:ad,
		link=:link,
		sira=:sira,
		durum=:durum


		");

	$guncelle=$esitle->execute(array(

		'ust' =>$_POST['ust'],
		'ad' =>$_POST['ad'],
		'link' =>$_POST['link'],
		'sira' =>$_POST['sira'],
		'durum' =>$_POST['durum']




	));

	if ($guncelle) {
		header("Location:admin/production/menuler.php?durum=ok");
	}

	else {
		header("Location:admin/production/menuler.php?durum=no");
	}

}

if (isset($_POST["menuduzenle"])) {

	$id=$_POST['id'];

	$esitle=$db->prepare("UPDATE menu SET

		ust=:ust,
		ad=:ad,
		link=:link,
		sira=:sira,
		durum=:durum

		WHERE id=$id


		");

	$guncelle=$esitle->execute(array(

		'ust' =>$_POST['ust'],
		'ad' =>$_POST['ad'],
		'link' =>$_POST['link'],
		'sira' =>$_POST['sira'],
		'durum' =>$_POST['durum']




	));

	if ($guncelle) {
		header("Location:admin/production/menu-duzenle.php?id=$id&durum=ok");
	}

	else {
		header("Location:admin/production/menu-duzenle.php?id=$id&durum=no");
	}

}

if ($_GET['menusil']=="ok") {

	$sil=$db->prepare("DELETE FROM menu WHERE id=:id");

	$check=$sil->execute(array(

		'id' =>$_GET['id']

	));


	if ($check) {
		header("Location:admin/production/menuler.php?durum=ok");
	}

	else {
		header("Location:admin/production/menuler.php?durum=no");
	}
}

if (isset($_POST["profilguncelle"])) {
	$id=$_POST['id'];


	$esitle=$db->prepare("UPDATE user SET

		kulladi=:kulladi,
		adsoyad=:adsoyad

		WHERE id=$id");

	$guncelle=$esitle->execute(array(

		'kulladi' =>$_POST['kulladi'],
		'adsoyad' =>$_POST['adsoyad']



	));


	if ($guncelle) {
		header("Location:admin/production/logout.php");
	}

	else {
		header("Location:admin/production/profil-ayar.php?durum=no");
	}

}

if (isset($_POST["sifreguncelle"])) {

	$id=$_POST['id'];
	$kullpass=md5($_POST['kullpass']);


	$kullanicisor=$db->prepare("SELECT * FROM user WHERE kullpass=:kullpass AND id=:id");
	$kullanicisor->execute(array(
		'id'=>$id,
		'kullpass'=>$kullpass

	));
	$say=$kullanicisor->rowCount();


	if ($say>0) {

		echo $yeni=$_POST['newpass'];
		echo $yenitekrar=$_POST['renewpass'];

		if ($yeni==$yenitekrar) {
			$esitle=$db->prepare("UPDATE user SET

				kullpass=:kullpass


				WHERE id=$id");

			$guncelle=$esitle->execute(array(

				'kullpass' =>md5($_POST['newpass'])




			));
			if ($guncelle) {
				header("Location:admin/production/logout.php");
			}

			else {
				header("Location:admin/production/sifre-guncelle.php?durum=no");
			}
		}else {
			header("Location:admin/production/sifre-guncelle.php?durum=no");
		}



	}else {
		header("Location:admin/production/sifre-guncelle.php?durum=no");
	}

}

if (isset($_POST["kullanicikaydet"])) {


	$esitle=$db->prepare("insert into user SET

		zaman=:zaman,
		kulladi=:kulladi,
		kullpass=:kullpass,
		adsoyad=:adsoyad,
		yetki=:yetki,
		durum=:durum

		");

	$guncelle=$esitle->execute(array(

		'zaman' =>$_POST['zaman'],
		'kulladi' =>$_POST['kulladi'],
		'kullpass' =>md5($_POST['kullpass']),
		'adsoyad' =>$_POST['adsoyad'],
		'yetki' =>$_POST['yetki'],
		'durum' =>$_POST['durum']



	));

	if ($guncelle) {
		header("Location:admin/production/kullanicilar.php?durum=ok");
	}

	else {
		header("Location:admin/production/kullanicilar.php?durum=no");
	}

}

if (isset($_POST["kullaniciguncelle"])) {

	if (!empty($_POST["kullpass"])) {



		$id=$_POST['id'];
		$esitle=$db->prepare("update user SET

			zaman=:zaman,
			kulladi=:kulladi,
			kullpass=:kullpass,
			adsoyad=:adsoyad,
			yetki=:yetki,
			durum=:durum

			where id=$id;

			");

		$guncelle=$esitle->execute(array(

			'zaman' =>$_POST['zaman'],
			'kulladi' =>$_POST['kulladi'],
			'kullpass' =>md5($_POST['kullpass']),
			'adsoyad' =>$_POST['adsoyad'],
			'yetki' =>$_POST['yetki'],
			'durum' =>$_POST['durum']


		));

		if ($guncelle) {
			header("Location:admin/production/kullanici-duzenle.php?id=$id&durum=ok");
		}

		else {
			header("Location:admin/production/kullanici-duzenle.php?id=$id&durum=no");
		}

	} else {
		$id=$_POST['id'];
		$esitle=$db->prepare("update user SET

			zaman=:zaman,
			kulladi=:kulladi,
			adsoyad=:adsoyad,
			yetki=:yetki,
			durum=:durum

			where id=$id;

			");

		$guncelle=$esitle->execute(array(

			'zaman' =>$_POST['zaman'],
			'kulladi' =>$_POST['kulladi'],
			'adsoyad' =>$_POST['adsoyad'],
			'yetki' =>$_POST['yetki'],
			'durum' =>$_POST['durum']


		));

		if ($guncelle) {
			header("Location:admin/production/kullanici-duzenle.php?id=$id&durum=ok");
		}

		else {
			header("Location:admin/production/kullanici-duzenle.php?id=$id&durum=no");
		}
	}

}

if ($_GET['kullanicisil']=="ok") {

	$sil=$db->prepare("DELETE FROM user WHERE id=:id");

	$check=$sil->execute(array(

		'id' =>$_GET['id']

	));


	if ($check) {
		header("Location:admin/production/kullanicilar.php?durum=ok");
	}

	else {
		header("Location:admin/production/kullanicilar.php?durum=no");
	}
}

if (isset($_POST["logoguncelle"])) {

	

	$uploads_dir="img/uploaads";

	@$tmp_name=$_FILES['ayar_logo']['tmp_name'];
	@$name=$_FILES['ayar_logo']['name'];
	$random=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 4)."/".$random.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$random$name");



	$esitle=$db->prepare("update ayarlar SET


		ayar_logo=:logo


		where id=0;

		");

	$guncelle=$esitle->execute(array(

		'logo' =>$refimgyol



	));

	if ($guncelle) {
		header("Location:admin/production/genel-ayar.php?durum=ok");
	}

	else {
		header("Location:admin/production/genel-ayar.php?durum=no");
	}

	
}

if (isset($_POST["sayfaekle"])) {

	

	$esitle=$db->prepare("insert into sayfalar SET

		baslik=:baslik,
		icerik=:icerik,
		durum=:durum
		

		");

	$guncelle=$esitle->execute(array(

		'baslik' =>$_POST['baslik'],
		'icerik' =>$_POST['icerik'],
		'durum' =>$_POST['durum']
		



	));

	if ($guncelle) {
		header("Location:admin/production/sayfalar.php?durum=ok");
	}

	else {
		header("Location:admin/production/sayfalar.php?durum=no");
	}

}

if (isset($_POST["sayfaduzenle"])) {



	$uploads_dir="img/uploaads";

	$id=$_POST['id'];
	$esitle=$db->prepare("update sayfalar SET

		baslik=:baslik,
		icerik=:icerik,
		durum=:durum
		


		where id=$id;

		");

	$guncelle=$esitle->execute(array(

		'baslik' =>$_POST['baslik'],
		'icerik' =>$_POST['icerik'],
		'durum' =>$_POST['durum']
		



	));

	if ($guncelle) {
		header("Location:admin/production/sayfa-duzenle.php?id=$id&durum=ok");
	}

	else {
		header("Location:admin/production/sayfa-duzenle.php?id=$id&durum=no");
	}

}

if ($_GET['sayfasil']=="ok") {

	$sil=$db->prepare("DELETE FROM sayfalar WHERE id=:id");

	$check=$sil->execute(array(

		'id' =>$_GET['id']

	));


	if ($check) {
		header("Location:admin/production/sayfalar.php?durum=ok");
	}

	else {
		header("Location:admin/production/sayfalar.php?durum=no");
	}
}

?>