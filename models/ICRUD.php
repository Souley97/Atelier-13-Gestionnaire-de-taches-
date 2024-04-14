<?php  
// interface Crud avec des methods create,read,update,delete


    // Définition de l'interface ICRUD
    interface ICRUD {
        // Méthode pour créer un nouvel élément
        public function create($data );
    
        // Méthode pour lire les détails d'un élément
        public function read($id);
        // Methods pour lire tous les elements
        public function readAll();    
        // Méthode pour mettre à jour un élément existant
        public function update($id, $data);
    
        // Méthode pour supprimer un élément
        public function delete($id);
    }
    
    ?>
    
