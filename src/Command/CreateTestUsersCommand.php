<?php

namespace App\Command;

use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:create-test-users',
    description: 'Creates test users (admin and regular user)',
)]
class CreateTestUsersCommand extends Command
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private UserPasswordHasherInterface $passwordHasher
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        // Create admin user (ID 111)
        $admin = new Utilisateur();
        $admin->setEmail('admin@test.com');
        $admin->setNom('Admin');
        $admin->setPrenom('User');
        $admin->setAge(30);
        $admin->setMdp($this->passwordHasher->hashPassword($admin, 'admin123'));
        
        // Create regular user
        $user = new Utilisateur();
        $user->setEmail('user@test.com');
        $user->setNom('Regular');
        $user->setPrenom('User');
        $user->setAge(25);
        $user->setMdp($this->passwordHasher->hashPassword($user, 'user123'));

        $this->entityManager->persist($admin);
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $io->success('Test users created successfully:');
        $io->table(
            ['Role', 'Email', 'Password'],
            [
                ['Admin', 'admin@test.com', 'admin123'],
                ['User', 'user@test.com', 'user123']
            ]
        );

        return Command::SUCCESS;
    }
}
