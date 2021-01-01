<?php

	class Search{

		 private $id;
		 private $code;
		 private $alpha2;
		 private $alpha3;
		 private $nom_en_gb;
		 private $nom_fr_fr;
		 private $db;

		public function __construct($db){
			
			$this->db = $db;
		}

		public function getSearch($recherche){

			$connexion_db = $this->db->connectDb();

			$q = $connexion_db->prepare("SELECT * FROM pays WHERE nom_en_gb LIKE '%$recherche%' OR nom_fr_fr LIKE '%$recherche%' ");
			$q->execute();
			$search_results = $q->fetchAll(PDO::FETCH_ASSOC);

			$search = null;

			if(!empty($search_results[0])){

				foreach( $search_results as $r){

					$search .="<a href='element.php?id=".$r['id']."'><p class='element'>".$r['nom_fr_fr']."</p></a><br/>";

				}

				return $search ; 

			}
			else{

				return '<p class="resultNull">Aucun résultat</p>';

			}

				

		
		}

		public function autoCompletion($recherche){

			$connexion_db = $this->db->connectDb();

			// la requete mysql
			$q = $connexion_db->prepare("SELECT * FROM pays WHERE nom_en_gb LIKE '%$recherche%' OR nom_fr_fr LIKE '%$recherche%'LIMIT 5");
			$q->execute();
			$search_results = $q->fetchAll(PDO::FETCH_ASSOC);

			$search = null;

			if(!empty($search_results[0])){

				foreach( $search_results as $r){

					$search .="<a href='recherche.php?search=".$r['nom_fr_fr']."'><p class='result'>".$r['nom_fr_fr']."</p></a><br/>";

				}

			return $search ;

			}
			else{

				return '<p class="resultNull">Aucun résultat</p>';

			}

			 

		}

		public function getRequestInfo($id){

			$connexion_db = $this->db->connectDb();
			$q = $connexion_db->prepare("SELECT * FROM pays WHERE id = $id ");
			$q->execute();
			$search_results = $q->fetch(PDO::FETCH_ASSOC);

			if(!empty($search_results)){

				return $search_results;
			}
			else{
				echo 'Pas de résultat';
			}

		}

		

	}



?>