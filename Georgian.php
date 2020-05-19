<?php


namespace Georgian {
    class Georgian {
        public $saxelobiti;
        public $motxrobiti;
        public $micemiti;
        public $natesaobiti;
        public $vitarebiti;
        public $moqmedebiti;
        public $wodebiti;

        public function __construct($word) {
            $this->motxrobiti = $this->motxrobiti($word);
            $this->micemiti = $this->micemiti($word);
            $this->natesaobiti = $this->natesaobiti($word);
        }

        private function motxrobiti($word) {
            $rootForm = getRoot($word);

            if (!lastIsVowel($word)) {
                if (has3Vowel($word)){
                    $rootForm = $word . "მ";
                } else $rootForm .= "მა";

            } else {
                $rootForm = $word . "მ";
            }

            return $rootForm;
        }
        private function micemiti($word){
            $rootForm = getRoot($word);

            $rootForm .= "ს";

            return $rootForm;
        }
        private function natesaobiti($word){
            $rootForm = getRoot($word);
            $shekvecili = kveca($rootForm);

            $shekvecili .= 'ის';

            return $shekvecili;
        }
    }
}
