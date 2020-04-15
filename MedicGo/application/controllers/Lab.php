<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Lab extends CI_Controller
{
    public function __construct()
    {
        // untuk mencegah akses tanpa login atau session
        parent::__construct();
        check_login();
        // load model
        $this->load->model('Menu_model', 'model');
    }

    public function searchitems()
    {
        $data['title'] = 'Requests';
        $keyword = $this->input->post('keyword');
        //ambil data dari session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // QUERY ITEMS using user ID
        $query = 'SELECT `user`.`id`,`user`.`email`,`request`.*
                  FROM `user` JOIN `request` 
                  ON `user`.`id` = `request`.`user_id`
                  WHERE `request`.`user_email` = "' . $this->session->userdata('email') . '"';

        $data['results'] = $this->db->query($query)->result_array();
        $data['results'] = $this->model->search_item($keyword);

        //redirect to homepage, set the controller view to..
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('lab/items_view', $data);
        // footer.php doesn't need $data to passed
        $this->load->view('templates/footer');
    }

    public function request()
    {
        $data['title'] = 'Lab Requests';

        //ambil data dari session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['request'] = $this->db->get('request')->result_array();

        // QUERY ITEMS using user ID
        $query = 'SELECT `user`.`id`,`user`.`email`,`request`.*
                FROM `user` JOIN `request` 
                ON `user`.`id` = `request`.`user_id`
                WHERE `request`.`user_email` = "' . $this->session->userdata('email') . '"';

        $data['test'] = $this->db->query($query)->result_array();
        // var_dump($test);
        // die;

        // check items form
        $this->form_validation->set_rules('item_name', 'Item_name', 'required');
        $this->form_validation->set_rules('notes', 'Notes', 'required');

        if ($this->form_validation->run() == false) {
            //redirect to homepage, set the controller view to..
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('lab/request', $data);
            // footer.php doesn't need $data to passed
            $this->load->view('templates/footer');
        } else {
            $data = [
                'item_name' => htmlspecialchars($this->input->post('item_name', true)),
                'notes' => htmlspecialchars($this->input->post('notes', true)),
                'last_modified' => time(),
                'user_id' => htmlspecialchars($this->input->post('user_id', true)),
                'user_email' => htmlspecialchars($this->input->post('user_email', true)),
            ];

            $this->db->insert('request', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Request successfully made!</div>');
            redirect('lab/request');
        }
    }

    public function request_radiology()
    {
        $data['title'] = 'Lab Requests - Radiology';

        //ambil data dari session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['request_radiology'] = $this->db->get('request_radiology')->result_array();

        // QUERY ITEMS using user ID
        $query = 'SELECT `user`.`id`,`user`.`email`,`request_radiology`.*
                FROM `user` JOIN `request_radiology` 
                ON `user`.`id` = `request_radiology`.`user_id`
                WHERE `request_radiology`.`user_email` = "' . $this->session->userdata('email') . '"';

        $data['test'] = $this->db->query($query)->result_array();
        // var_dump($test);
        // die;

        // check items form
        $this->form_validation->set_rules('item_name', 'Item_name', 'required');
        $this->form_validation->set_rules('notes', 'Notes', 'required');

        if ($this->form_validation->run() == false) {
            //redirect to homepage, set the controller view to..
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('lab/request_radiology', $data);
            // footer.php doesn't need $data to passed
            $this->load->view('templates/footer');
        } else {
            $data = [
                'item_name' => htmlspecialchars($this->input->post('item_name', true)),
                'notes' => htmlspecialchars($this->input->post('notes', true)),
                'last_modified' => time(),
                'user_id' => htmlspecialchars($this->input->post('user_id', true)),
                'user_email' => htmlspecialchars($this->input->post('user_email', true)),
                'image' => 'labdefault.png'
            ];

            $this->db->insert('request_radiology', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Request successfully made!</div>');
            redirect('lab/request_radiology');
        }
    }

    public function complete_request($id)
    {
        $data['title'] = 'Complete Request';

        //ambil data dari session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // get data from Menu_model
        $data['request'] = $this->model->getItemsById($id);

        $query = 'SELECT `request`.*,`completed_requests`.*
    FROM `request` JOIN `completed_requests` 
    ON `request`.`user_id` = `completed_requests`.`user_id`
    WHERE `completed_requests`.`user_email` = "' . $this->session->userdata('email') . '"';


        $data['test'] = $this->db->query($query)->result_array();

        // check items form

        $this->form_validation->set_rules('symptoms', 'Symptoms', 'required');
        $this->form_validation->set_rules('blood_type', 'Blood Type', 'required');
        $this->form_validation->set_rules('blood_pressure', 'Blood Pressure', 'required');
        $this->form_validation->set_rules('height', 'Height', 'required');
        $this->form_validation->set_rules('weight', 'Weight', 'required');
        $this->form_validation->set_rules('blood_glucose', 'Blood Glucose', 'required');
        $this->form_validation->set_rules('allergies', 'Allergies', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('lab/complete_request', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'item_name' => $this->input->post('item_name', true),
                'notes' => $this->input->post('notes', true),
                'user_id' => $this->input->post('user_id', true),
                'user_email' => $this->input->post('user_email', true),
                'symptoms' => $this->input->post('symptoms', true),
                'blood_type' => htmlspecialchars($this->input->post('blood_type', true)),
                'blood_pressure' => htmlspecialchars($this->input->post('blood_pressure', true)),
                'height' => $this->input->post('height', true),
                'weight' => $this->input->post('weight', true),
                'blood_glucose' => htmlspecialchars($this->input->post('blood_glucose', true)),
                'allergies' => htmlspecialchars($this->input->post('allergies', true)),
                'completed_on' => time(),
            ];
            $this->db->insert('completed_requests', $data);
            $this->db->where('id', $id);
            $this->db->delete('request');

            // redirect after insert 
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Request completed!</div>');
            redirect('lab/request');
        }
    }


    public function complete_request_radiology($id)
    {
        $data['title'] = 'Complete a Radiology Request';

        //ambil data dari session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // get data from Menu_model
        $data['request_radiology'] = $this->model->getAltItemsById($id);

        $query = 'SELECT `request_radiology`.*,`completed_requests_radiology`.*
    FROM `request_radiology` JOIN `completed_requests_radiology` 
    ON `request_radiology`.`user_id` = `completed_requests_radiology`.`user_id`
    WHERE `completed_requests_radiology`.`user_email` = "' . $this->session->userdata('email') . '"';


        $data['test'] = $this->db->query($query)->result_array();

        // check items form
        $this->form_validation->set_rules('notes', 'Notes', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('lab/complete_request_radiology', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'item_name' => $this->input->post('item_name', true),
                'user_id' => $this->input->post('user_id', true),
                'user_email' => $this->input->post('user_email', true),
                'notes' => $this->input->post('notes', true),
                'completed_on' => time()
            ];
            $upload_image = $_FILES['lab_image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/lab/results';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('lab_image')) {
                    $new_img = $this->upload->data('file_name');
                    $this->db->set('image', $new_img);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('user');
                }
            }
            $this->db->insert('completed_requests_radiology', $data);
            $this->db->where('id', $id);
            $this->db->delete('request_radiology');
            // redirect after insert 
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Request completed!</div>');
            redirect('lab/request_radiology');
        }
    }


    // DELETE ITEMS METHOD 
    public function deleteitems($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->model->deleteitems($id);

        // to check if user are admin or normal user
        if ($data['user']['role_id'] == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Request deleted!</div>');
            redirect('lab/request');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Request deleted!</div>');
            redirect('lab/request');
        }
    }

    public function updateitems($id)
    {
        $data['title'] = 'Edit Request';

        //ambil data dari session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // get data from Menu_model
        $data['request'] = $this->model->getItemsById($id);

        // check items form
        $this->form_validation->set_rules('item_name', 'Item_name', 'required');
        $this->form_validation->set_rules('notes', 'Notes', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('lab/updateitems', $data);
            // footer.php doesn't need $data to passed
            $this->load->view('templates/footer');
        } else {
            $this->model->updateitems();
            // redirect after insert 
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Items Updated!</div>');
            redirect('lab/request');
        }
    }

    public function completed_list()
    {
        $data['title'] = 'Completed Requests';

        //ambil data dari session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['completed_requests'] = $this->db->get('completed_requests')->result_array();

        // QUERY ITEMS using user ID
        $query = 'SELECT `user`.`id`,`user`.`email`,`completed_requests`.*
                FROM `user` JOIN `completed_requests` 
                ON `user`.`id` = `completed_requests`.`user_id`
                WHERE `completed_requests`.`user_email` = "' . $this->session->userdata('email') . '"';

        $data['test'] = $this->db->query($query)->result_array();
        // var_dump($test);
        // die;

        // check items form
        $this->form_validation->set_rules('item_name', 'Item_name', 'required');
        $this->form_validation->set_rules('type', 'type', 'required');
        $this->form_validation->set_rules('notes', 'Notes', 'required');

        if ($this->form_validation->run() == false) {
            //redirect to homepage, set the controller view to..
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('lab/completed_list', $data);
            // footer.php doesn't need $data to passed
            $this->load->view('templates/footer');
        } else {
            $data = [
                'item_name' => htmlspecialchars($this->input->post('item_name', true)),
                'type' => htmlspecialchars($this->input->post('type', true)),
                'notes' => htmlspecialchars($this->input->post('notes', true)),
                'completed_on' => time(),
                'user_id' => htmlspecialchars($this->input->post('user_id', true)),
                'user_email' => htmlspecialchars($this->input->post('user_email', true)),
            ];


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Request successfully made!</div>');
            redirect('user/completed_list');
        }
    }

    public function completed_list_radiology()
    {
        $data['title'] = 'Completed Radiology Requests';

        //ambil data dari session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['completed_requests_radiology'] = $this->db->get('completed_requests')->result_array();

        // QUERY ITEMS using user ID
        $query = 'SELECT `user`.`id`,`user`.`email`,`completed_requests_radiology`.*
                FROM `user` JOIN `completed_requests_radiology` 
                ON `user`.`id` = `completed_requests_radiology`.`user_id`
                WHERE `completed_requests_radiology`.`user_email` = "' . $this->session->userdata('email') . '"';

        $data['test'] = $this->db->query($query)->result_array();
        // var_dump($test);
        // die;

        // check items form
        $this->form_validation->set_rules('item_name', 'Item_name', 'required');
        $this->form_validation->set_rules('type', 'type', 'required');
        $this->form_validation->set_rules('notes', 'Notes', 'required');

        if ($this->form_validation->run() == false) {
            //redirect to homepage, set the controller view to..
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('lab/completed_list_radiology', $data);
            // footer.php doesn't need $data to passed
            $this->load->view('templates/footer');
        } else {
            $data = [
                'item_name' => htmlspecialchars($this->input->post('item_name', true)),
                'type' => htmlspecialchars($this->input->post('type', true)),
                'notes' => htmlspecialchars($this->input->post('notes', true)),
                'completed_on' => time(),
                'user_id' => htmlspecialchars($this->input->post('user_id', true)),
                'user_email' => htmlspecialchars($this->input->post('user_email', true)),
            ];


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Request successfully made!</div>');
            redirect('user/completed_list_radiology');
        }
    }

    public function view_request($id)
    {
        $data['title'] = 'View Completed Request';

        //ambil data dari session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // get data from Menu_model
        $data['completed_requests'] = $this->model->getViewItemsById($id);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('lab/view_request', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('completed_requests', $data);
            $this->model->view_request_detail();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Request completed!</div>');
            redirect('lab/completed_list');
        }
    }

    public function view_request_radiology($id)
    {
        $data['title'] = 'View Completed Radiology Request';

        //ambil data dari session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // get data from Menu_model
        $data['completed_requests_radiology'] = $this->model->getAltViewItemsById($id);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('lab/view_request_radiology', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('completed_requests', $data);
            $this->model->view_request_radiology_detail();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Request completed!</div>');
            redirect('lab/completed_list');
        }
    }
}
