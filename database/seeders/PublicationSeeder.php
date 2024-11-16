<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Liste des exemples de contenu pour les signaux de trading et cryptomonnaies
        $contentList = [
            'Achetez Bitcoin maintenant, potentiel de hausse à court terme.',
            'Signal de vente pour Ethereum. Prendre des bénéfices.',
            'Suivi du marché : Les altcoins montrent un potentiel d\'explosion.',
            'Bitcoin pourrait atteindre un nouveau sommet dans les prochains jours.',
            'Données de marché : Ethereum prêt à tester de nouveaux niveaux de résistance.',
            'Ne manquez pas cette opportunité de trading avec Ripple (XRP).',
            'Le marché des cryptos se redresse. Préparez-vous à acheter.',
            'Bitcoin approche d\'un niveau de support clé. Surveillez les achats.',
            'Signal d\'achat sur Litecoin. Le marché montre des signes positifs.',
            'Tendance haussière pour Cardano. Profitez de l\'opportunité.',
            'Suivez de près Binance Coin, un signal d\'achat puissant.',
            'Ethereum est prêt à exploser. Tenez-vous prêts pour une action rapide.',
            'Bitcoin pourrait être en train de créer un retournement haussier.',
            'Attention à la correction sur Dogecoin. Prenez vos profits.',
            'Les signaux de trading montrent une volatilité élevée sur les cryptomonnaies.',
            'Ethereum gagne en popularité. Les perspectives sont positives.',
            'Crypto-marché en forte hausse, Bitcoin à surveiller de près.',
            'Les signes de reprise sur le marché des cryptomonnaies sont évidents.',
            'Altcoins sous-évalués. C’est le moment d’acheter.',
            'Restez attentif à ces niveaux sur Ethereum. Signal d’achat en vue.',
            'Les fluctuations du marché des cryptos offrent des opportunités uniques.',
            'Les tendances du marché pointent vers une possible correction sur Bitcoin.',
            'Signal positif sur Polkadot, suivez ce projet de près.',
            'Le trading de Bitcoin est au plus haut, restez vigilant.',
            'XRP suit une tendance haussière, soyez prêts à entrer.',
            'Mise à jour sur le marché : Bitcoin en hausse de 5%.',
            'Bitcoin pourrait souffrir d’une correction, préparez-vous.',
            'Ethereum pourrait être le prochain grand gagnant sur le marché des cryptos.',
            'Litecoin montre des signes de reprise, soyez attentif à ce signal.',
            'Le marché des cryptos est volatile, restez informé.',
            'Profitez de la tendance haussière sur Chainlink.',
            'Les annonces de Bitcoin Cash marquent un tournant dans le marché.',
            'Signal d\'achat pour Solana, une opportunité à ne pas manquer.',
            'Ethereum continue de montrer des signes de force, à surveiller de près.',
            'Cardano : prochaine résistance à franchir pour confirmer la tendance.',
            'Le marché des cryptos reste dynamique. Préparez-vous pour la volatilité.',
            'De bons signaux sur Stellar, un potentiel caché.',
            'Surveillez le marché du Bitcoin. Des opportunités s’ouvrent à vous.',
            'N’oubliez pas de vérifier les prévisions pour Polkadot avant d’investir.',
            'Le marché des altcoins est en pleine croissance. N’attendez pas pour investir.',
            'DogeCoin pourrait connaître un pic, soyez prêt pour une action rapide.',
            'Les prévisions sur la crypto-monnaie Ethereum montrent une croissance stable.',
            'Les signaux sur Litecoin sont forts, il est temps de prendre position.',
            'Les analyses de marché indiquent un potentiel de hausse pour Chainlink.',
            'Le marché des cryptos est particulièrement dynamique aujourd’hui.',
            'Bitcoin montre une volatilité importante, soyez prêts à prendre des décisions rapides.',
            'D’autres hausses attendues sur Ethereum dans les prochains jours.',
            'Préparez-vous à profiter du marché haussier des cryptomonnaies.',
            'Bitcoin et Ethereum continuent de dominer le marché des cryptos.',
            'Les prévisions pour Ripple indiquent un potentiel de croissance élevé.',
            'Bitcoin semble prêt pour une prochaine forte hausse. Restez attentif.',
            'Le marché des cryptos reste à surveiller. Attendez-vous à des surprises.',
            'Bitcoin continue sa route vers un nouveau sommet. Profitez des signaux.',
            'Ethereum pourrait bientôt dépasser un niveau clé. Attention à l’achat.',
            'L’optimisme autour de Cardano augmente, c’est un signal positif.',
            'La tendance générale du marché des cryptos est en faveur des hausses.',
            'Signaux d’achat à long terme sur Polkadot.',
            'Chainlink continue de monter. Les signaux sont positifs.',
            'Prévisions sur le marché des cryptos indiquent une continuation haussière.',
            'Solana devient de plus en plus intéressant sur le marché.',
            'Bitcoin atteint un niveau historique. À surveiller.',
            'Les signaux d’achat sur Stellar se renforcent.',
            'Ethereum montre une résistance importante à franchir.',
            'La tendance générale est toujours positive pour Bitcoin.',
            'La force du marché des cryptomonnaies indique un futur positif.',
        ];

        // Création de 300 publications
        for ($i = 0; $i < 100; $i++) {
            // Choisir un utilisateur Analyste aléatoire
            $analyst = User::where('role', 'analyst')->inRandomOrder()->first();

            // Générer une publication avec un contenu aléatoire
            DB::table('publications')->insert([
                'content' => $faker->randomElement($contentList),
                // 'images' => json_encode([$faker->imageUrl(), $faker->imageUrl()]), // Liste d'images fictives
                'analyst_id' => $analyst ? $analyst->id : 1, // Attribuer un analyste aléatoire
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

}
