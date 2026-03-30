<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PortfolioImageModel;
use App\Models\PortfolioModel;

class PortfolioController extends BaseController
{
    protected const PROJECT_TYPES = [
        'E-commerce Website',
        'Website Design',
        'Web Application',
        'E-comm Mobile App',
        'Subscription Website',
        'Corporate Website',
        'Digital Campaign',
    ];

    protected $portfolioModel;
    protected $imageModel;

    public function __construct()
    {
        helper(['form', 'url', 'text']);
        $this->portfolioModel = new PortfolioModel();
        $this->imageModel = new PortfolioImageModel();
    }

    public function index()
    {
        $portfolios = $this->portfolioModel
            ->orderBy('sort_order', 'ASC')
            ->orderBy('id', 'ASC')
            ->findAll();

        return view('admin/portfolios/index', [
            'portfolios' => $portfolios,
            'pageTitle' => 'Portfolios',
        ]);
    }

    public function create()
    {
        return view('admin/portfolios/form', [
            'portfolio' => null,
            'projectTypes' => self::PROJECT_TYPES,
            'action' => 'admin/portfolios/store',
            'method' => 'create',
            'pageTitle' => 'Create Portfolio',
        ]);
    }

    public function store()
    {
        $rules = [
            'title' => 'required|min_length[2]',
            'year' => 'permit_empty|max_length[20]',
            'url' => 'permit_empty|valid_url',
            'short_description' => 'permit_empty',
            'content' => 'permit_empty',
            'cover_image' => 'permit_empty|is_image[cover_image]|max_size[cover_image,2048]',
            'industry' => 'permit_empty|max_length[150]',
            'project_type' => 'permit_empty',
            'roler' => 'permit_empty|max_length[150]',
            'main_image' => 'permit_empty|is_image[main_image]|max_size[main_image,4096]',
            'project_overview' => 'permit_empty',
            'problem_statement' => 'permit_empty',
            'key_challenges_identified' => 'permit_empty',
            'goals_objectives' => 'permit_empty',
            'problem_statement_image1' => 'permit_empty|is_image[problem_statement_image1]|max_size[problem_statement_image1,4096]',
            'problem_statement_image2' => 'permit_empty|is_image[problem_statement_image2]|max_size[problem_statement_image2,4096]',
            'research_analysis' => 'permit_empty',
            'information_architecture' => 'permit_empty',
            'wireframing' => 'permit_empty',
            'user_experience_process_img1' => 'permit_empty|is_image[user_experience_process_img1]|max_size[user_experience_process_img1,4096]',
            'user_experience_process_img2' => 'permit_empty|is_image[user_experience_process_img2]|max_size[user_experience_process_img2,4096]',
            'design_system' => 'permit_empty',
            'the_system_included' => 'permit_empty',
            'design_system_img1' => 'permit_empty|is_image[design_system_img1]|max_size[design_system_img1,4096]',
            'design_system_img2' => 'permit_empty|is_image[design_system_img2]|max_size[design_system_img2,4096]',
            'design_system_img3' => 'permit_empty|is_image[design_system_img3]|max_size[design_system_img3,4096]',
            'ui_design' => 'permit_empty',
            'design_highlights' => 'permit_empty',
            'ui_design_img1' => 'permit_empty|is_image[ui_design_img1]|max_size[ui_design_img1,4096]',
            'ui_design_img2' => 'permit_empty|is_image[ui_design_img2]|max_size[ui_design_img2,4096]',
            'ui_design_img3' => 'permit_empty|is_image[ui_design_img3]|max_size[ui_design_img3,4096]',
            'ui_design_img4' => 'permit_empty|is_image[ui_design_img4]|max_size[ui_design_img4,4096]',
            'responsive_design' => 'permit_empty',
            'special_attention_given_to' => 'permit_empty',
            'responsive_design_img1' => 'permit_empty|is_image[responsive_design_img1]|max_size[responsive_design_img1,4096]',
            'responsive_design_img2' => 'permit_empty|is_image[responsive_design_img2]|max_size[responsive_design_img2,4096]',
            'responsive_design_img3' => 'permit_empty|is_image[responsive_design_img3]|max_size[responsive_design_img3,4096]',
            'final_outcome' => 'permit_empty',
            'key_learnings' => 'permit_empty',
            'published_at' => 'permit_empty',
            'sort_order' => 'permit_empty|integer',
            'is_active' => 'permit_empty|in_list[0,1]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $projectType = trim((string) $this->request->getPost('project_type'));
        if ($projectType !== '' && !in_array($projectType, self::PROJECT_TYPES, true)) {
            return redirect()->back()->withInput()->with('errors', ['project_type' => 'Invalid project type selected.']);
        }

        $db = db_connect();
        $db->transStart();

        $title = $this->request->getPost('title');
        $slug = $this->generateUniqueSlug($title);
        $urlColumn = $this->getPortfolioUrlColumn();

        $coverPath = null;
        $coverFile = $this->request->getFile('cover_image');
        if ($coverFile && $coverFile->isValid() && !$coverFile->hasMoved()) {
            $coverPath = moveUploadedFile($coverFile, 'portfolios/cover');
        }

        $insertData = [
            'slug' => $slug,
            'title' => $title,
            'year' => $this->request->getPost('year') ?: null,
            'short_description' => $this->request->getPost('short_description') ?: null,
            'content' => $this->request->getPost('content') ?: null,
            'cover_image_path' => $coverPath,
            'industry' => $this->request->getPost('industry') ?: null,
            'project_type' => $projectType !== '' ? $projectType : null,
            'roler' => $this->request->getPost('roler') ?: null,
            'main_image_path' => $this->uploadPortfolioDetailImage('main_image'),
            'project_overview' => $this->request->getPost('project_overview') ?: null,
            'problem_statement' => $this->request->getPost('problem_statement') ?: null,
            'key_challenges_identified' => $this->request->getPost('key_challenges_identified') ?: null,
            'goals_objectives' => $this->request->getPost('goals_objectives') ?: null,
            'problem_statement_image1_path' => $this->uploadPortfolioDetailImage('problem_statement_image1'),
            'problem_statement_image2_path' => $this->uploadPortfolioDetailImage('problem_statement_image2'),
            'research_analysis' => $this->request->getPost('research_analysis') ?: null,
            'information_architecture' => $this->request->getPost('information_architecture') ?: null,
            'wireframing' => $this->request->getPost('wireframing') ?: null,
            'user_experience_process_img1_path' => $this->uploadPortfolioDetailImage('user_experience_process_img1'),
            'user_experience_process_img2_path' => $this->uploadPortfolioDetailImage('user_experience_process_img2'),
            'design_system' => $this->request->getPost('design_system') ?: null,
            'the_system_included' => $this->request->getPost('the_system_included') ?: null,
            'design_system_img1_path' => $this->uploadPortfolioDetailImage('design_system_img1'),
            'design_system_img2_path' => $this->uploadPortfolioDetailImage('design_system_img2'),
            'design_system_img3_path' => $this->uploadPortfolioDetailImage('design_system_img3'),
            'ui_design' => $this->request->getPost('ui_design') ?: null,
            'design_highlights' => $this->request->getPost('design_highlights') ?: null,
            'ui_design_img1_path' => $this->uploadPortfolioDetailImage('ui_design_img1'),
            'ui_design_img2_path' => $this->uploadPortfolioDetailImage('ui_design_img2'),
            'ui_design_img3_path' => $this->uploadPortfolioDetailImage('ui_design_img3'),
            'ui_design_img4_path' => $this->uploadPortfolioDetailImage('ui_design_img4'),
            'responsive_design' => $this->request->getPost('responsive_design') ?: null,
            'special_attention_given_to' => $this->request->getPost('special_attention_given_to') ?: null,
            'responsive_design_img1_path' => $this->uploadPortfolioDetailImage('responsive_design_img1'),
            'responsive_design_img2_path' => $this->uploadPortfolioDetailImage('responsive_design_img2'),
            'responsive_design_img3_path' => $this->uploadPortfolioDetailImage('responsive_design_img3'),
            'final_outcome' => $this->request->getPost('final_outcome') ?: null,
            'key_learnings' => $this->request->getPost('key_learnings') ?: null,
            'published_at' => $this->normalizePublishedAt($this->request->getPost('published_at')),
            'sort_order' => (int) ($this->request->getPost('sort_order') ?: 0),
            'is_active' => (int)($this->request->getPost('is_active') ?: 0),
        ];

        if ($urlColumn !== null) {
            $insertData[$urlColumn] = $this->request->getPost('url') ?: null;
        }

        $portfolioId = $this->portfolioModel->insert($insertData);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->withInput()->with('error', 'Failed to create portfolio.');
        }

        return redirect()->to('admin/portfolios')->with('success', 'Portfolio created.');
    }

    public function edit($id)
    {
        $portfolio = $this->portfolioModel->find($id);
        if (!$portfolio) {
            return redirect()->to('admin/portfolios')->with('error', 'Portfolio not found.');
        }

        return view('admin/portfolios/form', [
            'portfolio' => $portfolio,
            'projectTypes' => self::PROJECT_TYPES,
            'action' => 'admin/portfolios/update/' . $id,
            'method' => 'edit',
            'pageTitle' => 'Edit Portfolio',
        ]);
    }

    public function update($id)
    {
        $portfolio = $this->portfolioModel->find($id);
        if (!$portfolio) {
            return redirect()->to('admin/portfolios')->with('error', 'Portfolio not found.');
        }

        $rules = [
            'title' => 'required|min_length[2]',
            'year' => 'permit_empty|max_length[20]',
            'url' => 'permit_empty|valid_url',
            'short_description' => 'permit_empty',
            'content' => 'permit_empty',
            'cover_image' => 'permit_empty|is_image[cover_image]|max_size[cover_image,2048]',
            'industry' => 'permit_empty|max_length[150]',
            'project_type' => 'permit_empty',
            'roler' => 'permit_empty|max_length[150]',
            'main_image' => 'permit_empty|is_image[main_image]|max_size[main_image,4096]',
            'project_overview' => 'permit_empty',
            'problem_statement' => 'permit_empty',
            'key_challenges_identified' => 'permit_empty',
            'goals_objectives' => 'permit_empty',
            'problem_statement_image1' => 'permit_empty|is_image[problem_statement_image1]|max_size[problem_statement_image1,4096]',
            'problem_statement_image2' => 'permit_empty|is_image[problem_statement_image2]|max_size[problem_statement_image2,4096]',
            'research_analysis' => 'permit_empty',
            'information_architecture' => 'permit_empty',
            'wireframing' => 'permit_empty',
            'user_experience_process_img1' => 'permit_empty|is_image[user_experience_process_img1]|max_size[user_experience_process_img1,4096]',
            'user_experience_process_img2' => 'permit_empty|is_image[user_experience_process_img2]|max_size[user_experience_process_img2,4096]',
            'design_system' => 'permit_empty',
            'the_system_included' => 'permit_empty',
            'design_system_img1' => 'permit_empty|is_image[design_system_img1]|max_size[design_system_img1,4096]',
            'design_system_img2' => 'permit_empty|is_image[design_system_img2]|max_size[design_system_img2,4096]',
            'design_system_img3' => 'permit_empty|is_image[design_system_img3]|max_size[design_system_img3,4096]',
            'ui_design' => 'permit_empty',
            'design_highlights' => 'permit_empty',
            'ui_design_img1' => 'permit_empty|is_image[ui_design_img1]|max_size[ui_design_img1,4096]',
            'ui_design_img2' => 'permit_empty|is_image[ui_design_img2]|max_size[ui_design_img2,4096]',
            'ui_design_img3' => 'permit_empty|is_image[ui_design_img3]|max_size[ui_design_img3,4096]',
            'ui_design_img4' => 'permit_empty|is_image[ui_design_img4]|max_size[ui_design_img4,4096]',
            'responsive_design' => 'permit_empty',
            'special_attention_given_to' => 'permit_empty',
            'responsive_design_img1' => 'permit_empty|is_image[responsive_design_img1]|max_size[responsive_design_img1,4096]',
            'responsive_design_img2' => 'permit_empty|is_image[responsive_design_img2]|max_size[responsive_design_img2,4096]',
            'responsive_design_img3' => 'permit_empty|is_image[responsive_design_img3]|max_size[responsive_design_img3,4096]',
            'final_outcome' => 'permit_empty',
            'key_learnings' => 'permit_empty',
            'published_at' => 'permit_empty',
            'sort_order' => 'permit_empty|integer',
            'is_active' => 'permit_empty|in_list[0,1]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $projectType = trim((string) $this->request->getPost('project_type'));
        if ($projectType !== '' && !in_array($projectType, self::PROJECT_TYPES, true)) {
            return redirect()->back()->withInput()->with('errors', ['project_type' => 'Invalid project type selected.']);
        }

        $db = db_connect();
        $db->transStart();

        $title = $this->request->getPost('title');
        $slug = $this->generateUniqueSlug($title, $id);
        $urlColumn = $this->getPortfolioUrlColumn();

        $data = [
            'slug' => $slug,
            'title' => $title,
            'year' => $this->request->getPost('year') ?: null,
            'short_description' => $this->request->getPost('short_description') ?: null,
            'content' => $this->request->getPost('content') ?: null,
            'industry' => $this->request->getPost('industry') ?: null,
            'project_type' => $projectType !== '' ? $projectType : null,
            'roler' => $this->request->getPost('roler') ?: null,
            'project_overview' => $this->request->getPost('project_overview') ?: null,
            'problem_statement' => $this->request->getPost('problem_statement') ?: null,
            'key_challenges_identified' => $this->request->getPost('key_challenges_identified') ?: null,
            'goals_objectives' => $this->request->getPost('goals_objectives') ?: null,
            'research_analysis' => $this->request->getPost('research_analysis') ?: null,
            'information_architecture' => $this->request->getPost('information_architecture') ?: null,
            'wireframing' => $this->request->getPost('wireframing') ?: null,
            'design_system' => $this->request->getPost('design_system') ?: null,
            'the_system_included' => $this->request->getPost('the_system_included') ?: null,
            'ui_design' => $this->request->getPost('ui_design') ?: null,
            'design_highlights' => $this->request->getPost('design_highlights') ?: null,
            'responsive_design' => $this->request->getPost('responsive_design') ?: null,
            'special_attention_given_to' => $this->request->getPost('special_attention_given_to') ?: null,
            'final_outcome' => $this->request->getPost('final_outcome') ?: null,
            'key_learnings' => $this->request->getPost('key_learnings') ?: null,
            'published_at' => $this->normalizePublishedAt($this->request->getPost('published_at')),
            'sort_order' => (int) ($this->request->getPost('sort_order') ?: 0),
            'is_active' => (int)($this->request->getPost('is_active') ?: 0),
        ];

        if ($urlColumn !== null) {
            $data[$urlColumn] = $this->request->getPost('url') ?: null;
        }

        $coverFile = $this->request->getFile('cover_image');
        if ($coverFile && $coverFile->isValid() && !$coverFile->hasMoved()) {
            $newPath = moveUploadedFile($coverFile, 'portfolios/cover');
            if ($newPath !== null) {
                $data['cover_image_path'] = $newPath;
                removeUploadedFile($portfolio['cover_image_path'] ?? null);
            }
        }

        $this->replacePortfolioDetailImage($data, $portfolio, 'main_image', 'main_image_path');
        $this->replacePortfolioDetailImage($data, $portfolio, 'problem_statement_image1', 'problem_statement_image1_path');
        $this->replacePortfolioDetailImage($data, $portfolio, 'problem_statement_image2', 'problem_statement_image2_path');
        $this->replacePortfolioDetailImage($data, $portfolio, 'user_experience_process_img1', 'user_experience_process_img1_path');
        $this->replacePortfolioDetailImage($data, $portfolio, 'user_experience_process_img2', 'user_experience_process_img2_path');
        $this->replacePortfolioDetailImage($data, $portfolio, 'design_system_img1', 'design_system_img1_path');
        $this->replacePortfolioDetailImage($data, $portfolio, 'design_system_img2', 'design_system_img2_path');
        $this->replacePortfolioDetailImage($data, $portfolio, 'design_system_img3', 'design_system_img3_path');
        $this->replacePortfolioDetailImage($data, $portfolio, 'ui_design_img1', 'ui_design_img1_path');
        $this->replacePortfolioDetailImage($data, $portfolio, 'ui_design_img2', 'ui_design_img2_path');
        $this->replacePortfolioDetailImage($data, $portfolio, 'ui_design_img3', 'ui_design_img3_path');
        $this->replacePortfolioDetailImage($data, $portfolio, 'ui_design_img4', 'ui_design_img4_path');
        $this->replacePortfolioDetailImage($data, $portfolio, 'responsive_design_img1', 'responsive_design_img1_path');
        $this->replacePortfolioDetailImage($data, $portfolio, 'responsive_design_img2', 'responsive_design_img2_path');
        $this->replacePortfolioDetailImage($data, $portfolio, 'responsive_design_img3', 'responsive_design_img3_path');

        $this->portfolioModel->update($id, $data);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->withInput()->with('error', 'Failed to update portfolio.');
        }

        return redirect()->to('admin/portfolios')->with('success', 'Portfolio updated.');
    }

    public function delete($id)
    {
        $portfolio = $this->portfolioModel->find($id);
        if ($portfolio) {
            $this->removeFileIfExists($portfolio['cover_image_path'] ?? null);
            $this->removeFileIfExists($portfolio['main_image_path'] ?? null);
            $this->removeFileIfExists($portfolio['problem_statement_image1_path'] ?? null);
            $this->removeFileIfExists($portfolio['problem_statement_image2_path'] ?? null);
            $this->removeFileIfExists($portfolio['user_experience_process_img1_path'] ?? null);
            $this->removeFileIfExists($portfolio['user_experience_process_img2_path'] ?? null);
            $this->removeFileIfExists($portfolio['design_system_img1_path'] ?? null);
            $this->removeFileIfExists($portfolio['design_system_img2_path'] ?? null);
            $this->removeFileIfExists($portfolio['design_system_img3_path'] ?? null);
            $this->removeFileIfExists($portfolio['ui_design_img1_path'] ?? null);
            $this->removeFileIfExists($portfolio['ui_design_img2_path'] ?? null);
            $this->removeFileIfExists($portfolio['ui_design_img3_path'] ?? null);
            $this->removeFileIfExists($portfolio['ui_design_img4_path'] ?? null);
            $this->removeFileIfExists($portfolio['responsive_design_img1_path'] ?? null);
            $this->removeFileIfExists($portfolio['responsive_design_img2_path'] ?? null);
            $this->removeFileIfExists($portfolio['responsive_design_img3_path'] ?? null);

            $images = $this->imageModel->where('portfolio_id', $id)->findAll();
            foreach ($images as $img) {
                removeUploadedFile($img['image_path'] ?? null);
            }

            $this->portfolioModel->delete($id);
        }

        return redirect()->to('admin/portfolios')->with('success', 'Portfolio deleted.');
    }

    public function deleteImage($portfolioId, $imageId)
    {
        $image = $this->imageModel->where('portfolio_id', $portfolioId)->where('id', $imageId)->first();
        if ($image) {
            removeUploadedFile($image['image_path'] ?? null);
            $this->imageModel->delete($imageId);
        }

        return redirect()->to('admin/portfolios/edit/' . $portfolioId)->with('success', 'Image removed.');
    }

    protected function generateUniqueSlug(string $title, $ignoreId = null): string
    {
        $base = url_title($title, '-', true);
        $slug = $base;
        $suffix = 1;

        while ($this->slugExists($slug, $ignoreId)) {
            $slug = $base . '-' . $suffix;
            $suffix++;
        }

        return $slug;
    }

    protected function slugExists(string $slug, $ignoreId = null): bool
    {
        $builder = $this->portfolioModel->where('slug', $slug);
        if ($ignoreId) {
            $builder->where('id !=', $ignoreId);
        }
        return $builder->countAllResults() > 0;
    }

    protected function normalizePublishedAt($value): ?string
    {
        if (!$value) {
            return null;
        }

        return str_replace('T', ' ', $value);
    }

    protected function uploadPortfolioDetailImage(string $fieldName): ?string
    {
        $file = $this->request->getFile($fieldName);
        if (!$file) {
            return null;
        }

        return moveUploadedFile($file, 'portfolios/details');
    }

    protected function replacePortfolioDetailImage(array &$data, array $portfolio, string $fieldName, string $columnName): void
    {
        $newPath = $this->uploadPortfolioDetailImage($fieldName);
        if ($newPath === null) {
            return;
        }

        $this->removeFileIfExists($portfolio[$columnName] ?? null);
        $data[$columnName] = $newPath;
    }

    protected function removeFileIfExists(?string $relativePath): void
    {
        removeUploadedFile($relativePath);
    }

    protected function getPortfolioUrlColumn(): ?string
    {
        $db = db_connect();

        if ($db->fieldExists('url', 'portfolios')) {
            return 'url';
        }

        if ($db->fieldExists('live_url', 'portfolios')) {
            return 'live_url';
        }

        return null;
    }
}
