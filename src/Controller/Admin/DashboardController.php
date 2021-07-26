<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Comment;
use App\Entity\Continent;
use App\Entity\Country;
use App\Entity\ForumSubject;
use App\Entity\Post;
use App\Entity\Response;
use App\Entity\Stuff;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response as Resp;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Resp
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('O Backpack - Admin');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('User', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Comment', 'fas fa-user', Comment::class);
        yield MenuItem::linkToCrud('Continent', 'fas fa-user', Continent::class);
        yield MenuItem::linkToCrud('Country', 'fas fa-user', Country::class);
        yield MenuItem::linkToCrud('ForumSubject', 'fas fa-user', ForumSubject::class);
        yield MenuItem::linkToCrud('Post', 'fas fa-user', Post::class);
        yield MenuItem::linkToCrud('Response', 'fas fa-user', Response::class);
        yield MenuItem::linkToCrud('Stuff', 'fas fa-user', Stuff::class);
    }
}
