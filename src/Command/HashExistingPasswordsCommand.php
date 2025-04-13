<?php

namespace App\Command;

use App\Entity\Utilisateur;
use App\Repository\UtilisateurRepository;
use App\Service\PasswordHashService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:hash-existing-passwords',
    description: 'Hash all existing user passwords in the database',
)]
class HashExistingPasswordsCommand extends Command
{
    private $utilisateurRepository;
    private $passwordHashService;
    private $entityManager;

    public function __construct(
        UtilisateurRepository $utilisateurRepository,
        PasswordHashService $passwordHashService,
        EntityManagerInterface $entityManager
    ) {
        parent::__construct();
        $this->utilisateurRepository = $utilisateurRepository;
        $this->passwordHashService = $passwordHashService;
        $this->entityManager = $entityManager;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('Hashage des mots de passe existants');

        $utilisateurs = $this->utilisateurRepository->findAll();
        $count = 0;

        if (empty($utilisateurs)) {
            $io->warning('Aucun utilisateur trouvé dans la base de données.');
            return Command::SUCCESS;
        }

        $io->progressStart(count($utilisateurs));
        
        foreach ($utilisateurs as $utilisateur) {
            $plainPassword = $utilisateur->getMdp();
            // Vérifier si le mot de passe est déjà hashé
            if (strlen($plainPassword) < 20) { // Un mot de passe hashé est généralement long
                $hashedPassword = $this->passwordHashService->hashPassword($utilisateur, $plainPassword);
                $utilisateur->setMdp($hashedPassword);
                $count++;
            }
            $io->progressAdvance();
        }
        
        $this->entityManager->flush();
        $io->progressFinish();
        
        $io->success("$count mots de passe ont été hashés avec succès.");
        
        return Command::SUCCESS;
    }
}