<?php
class Berita extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('BeritaModel');
    }

   public function index()
{
    $this->load->library('pagination');

    $keyword = $this->input->get('q');
    $start = $this->input->get('start') ?? 0;
    $limit = 5;

    $config = [
    'page_query_string'      => TRUE,
    'query_string_segment'   => 'start',
    'use_page_numbers'       => FALSE, 
    'per_page'               => $limit,
    'full_tag_open'          => '<ul class="pagination">',
    'full_tag_close'         => '</ul>',
    'cur_tag_open'           => '<li class="active"><a>',
    'cur_tag_close'          => '</a></li>',
    'num_tag_open'           => '<li>',
    'num_tag_close'          => '</li>',
    'prev_tag_open'          => '<li>',
    'prev_tag_close'         => '</li>',
    'next_tag_open'          => '<li>',
    'next_tag_close'         => '</li>',
];


    if (!empty($keyword)) {
        $config['total_rows'] = $this->BeritaModel->countSearch($keyword);
        $config['base_url'] = site_url('berita') . '?q=' . urlencode($keyword);
        $berita = $this->BeritaModel->search($keyword, $limit, $start);
    } else {
        $config['total_rows'] = $this->BeritaModel->count();
        $config['base_url'] = site_url('berita');
        $berita = $this->BeritaModel->getPagination($limit, $start);
    }

    $this->pagination->initialize($config);

    $data['berita'] = $berita;
    $data['keyword'] = $keyword ?? '';
    $this->render_backend('berita', $data);
}

    public function edit($id)
    {
        if ($this->session->userdata('role') == 'user')
            show_404();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        $data['row'] = $this->BeritaModel->getById($id);

        if ($this->form_validation->run() == FALSE) {
            $this->render_backend('berita_form', $data);
        } else {
            $update = [
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi')
            ];
            $this->BeritaModel->update($id, $update);
            redirect('berita');
        }
    }


    public function delete($id)
    {
        if ($this->session->userdata('role') == 'user')
            show_404();
        $this->BeritaModel->delete($id);
        redirect('berita');
    }
}
