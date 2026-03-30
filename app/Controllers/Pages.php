<?php

namespace App\Controllers;

use Config\Services;
use App\Models\HomeBannerModel;
use App\Models\PortfolioModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Pages extends BaseController
{
    private function render(string $title, string $page, array $data = []): string
    {
        return view('layouts/header', ['title' => $title] + $data)
            . view('pages/' . $page, $data)
            . view('layouts/footer');
    }

    public function home(): string
    {
        $bannerModel = new HomeBannerModel();
        $banners = $bannerModel
            ->where('is_active', 1)
            ->orderBy('sort_order', 'ASC')
            ->findAll();

        return $this->render('Home', 'home', [
            'banners' => $banners,
        ]);
    }

    public function about(): string
    {
        return $this->render('About Us', 'about');
    }

    public function projects(): string
    {
        $portfolioModel = new PortfolioModel();
        $projects = $portfolioModel
            ->where('is_active', 1)
            ->orderBy('sort_order', 'ASC')
            ->orderBy('id', 'ASC')
            ->findAll();

        return $this->render('Projects', 'projects', [
            'projects' => $projects,
        ]);
    }

    public function projectDetail(string $slug): string
    {
        $portfolioModel = new PortfolioModel();
        $project = $portfolioModel
            ->where('slug', $slug)
            ->where('is_active', 1)
            ->first();

        if (!$project) {
            throw PageNotFoundException::forPageNotFound();
        }

        $projectSortOrder = (int)($project['sort_order'] ?? 0);
        $projectId = (int)($project['id'] ?? 0);

        $previousProject = $portfolioModel
            ->where('is_active', 1)
            ->groupStart()
                ->where('sort_order <', $projectSortOrder)
                ->orGroupStart()
                    ->where('sort_order', $projectSortOrder)
                    ->where('id <', $projectId)
                ->groupEnd()
            ->groupEnd()
            ->orderBy('sort_order', 'DESC')
            ->orderBy('id', 'DESC')
            ->first();

        $nextProject = $portfolioModel
            ->where('is_active', 1)
            ->groupStart()
                ->where('sort_order >', $projectSortOrder)
                ->orGroupStart()
                    ->where('sort_order', $projectSortOrder)
                    ->where('id >', $projectId)
                ->groupEnd()
            ->groupEnd()
            ->orderBy('sort_order', 'ASC')
            ->orderBy('id', 'ASC')
            ->first();

        return $this->render($project['title'] ?? 'Project Detail', 'project-detail', [
            'project' => $project,
            'previousProject' => $previousProject,
            'nextProject' => $nextProject,
        ]);
    }

    public function contact(): string
    {
        return $this->render('Contact', 'contact');
    }

    public function submitContact()
    {
        helper(['form', 'url']);

        $rules = [
            'first_name' => 'required|min_length[2]|max_length[100]',
            'last_name' => 'required|min_length[1]|max_length[100]',
            'email' => 'required|valid_email|max_length[150]',
            'project_type' => 'permit_empty|max_length[150]',
            'message' => 'required|min_length[5]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $firstName = trim((string) $this->request->getPost('first_name'));
        $lastName = trim((string) $this->request->getPost('last_name'));
        $email = trim((string) $this->request->getPost('email'));
        $projectType = trim((string) $this->request->getPost('project_type'));
        $message = trim((string) $this->request->getPost('message'));

        $fullName = trim($firstName . ' ' . $lastName);

        $mailMessage = "New contact enquiry\n\n";
        $mailMessage .= "Name: {$fullName}\n";
        $mailMessage .= "Email: {$email}\n";
        $mailMessage .= 'Project Type: ' . ($projectType !== '' ? $projectType : '-') . "\n\n";
        $mailMessage .= "Message:\n{$message}\n";

        $emailService = Services::email();
        $emailService->setTo('mailme@iamshameer.com');
        $emailService->setFrom('mailme@iamshameer.com', 'Website Contact Form');
        $emailService->setReplyTo($email, $fullName !== '' ? $fullName : null);
        $emailService->setSubject('New Contact Form Submission');
        $emailService->setMessage($mailMessage);

        if (!$emailService->send()) {
            return redirect()->back()->withInput()->with('error', 'Failed to send your message. Please try again.');
        }

        return redirect()->to('contact')->with('success', 'Your message has been sent successfully.');
    }
}
