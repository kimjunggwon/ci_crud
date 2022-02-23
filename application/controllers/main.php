<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('todo_m');
        $this->load->helper(array('url', 'date'));
    }

    public function index()
    {
        $this->lists();
    }

    public function lists()
    {
        $data['list'] = $this->todo_m->get_list();

        $this->load->view('todo/list_v', $data);
    }

    function view()
    {
        $id = $this->uri->segment(3);

        $data['views'] = $this->todo_m->get_view($id);

        $this->load->view('todo/view_v', $data);
    }

    public function write()
    {
        if($_POST)
        {
            $content = $this->input->post('content', TRUE);
            $created_on = $this->input->post('created_on', TRUE);
            $due_date = $this->input->post('due_date', TRUE);
        }
    }
}
?>