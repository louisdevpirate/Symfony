<?php

namespace App\Security\Voter;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class CategoryVoter extends Voter
{
    public const EDIT = 'POST_EDIT';
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    protected function supports(string $attribute, mixed $subject): bool
    {
        return in_array($attribute, ['CAN_EDIT'])
            && $subject instanceof \App\Entity\Category;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        $category = $this->categoryRepository->find($subject);

        if (!$category) {
            return false;
        }

        // ... (check conditions and return true to grant permission) ...
        switch ($attribute) {
            case 'CAN_EDIT':
                return $category->getOwner() === $user;
        }

        return false;
    }
}
