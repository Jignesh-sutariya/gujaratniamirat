<?php defined('BASEPATH') OR exit('No direct script access allowed');
use Paykun\Checkout\Payment;

class Home extends CI_Controller {
	
	public function index()
    {
        $data['title'] = 'home';
        $data['name'] = 'home';
        $data['cats'] = $this->main->getall('blog_category', 'cat_name, cat_slug, CONCAT("'.assets('images/blog-category/').'", cat_image) cat_image', ['is_deleted' => 0], 'id ASC');
        $data['blogs'] = $this->main->getall('blog', 'title, blog_slug, CONCAT("'.assets('blog/').'", image) image', ['is_deleted' => 0], 'id DESC', '3');
        $data['interviews'] = $this->main->getall('interview', 'title, interview_slug, youtube_url', ['is_deleted' => 0], 'id DESC', '3');
        
        $validate = [
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required"
                ]
            ],
            [
                'field' => 'email',
                'label' => 'Email Id',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required"
                ]
            ]
        ];

        $this->form_validation->set_rules($validate);
        
        if ($this->form_validation->run() == FALSE) {
            return $this->template->load(front('template'), front('home'), $data);
        }else{
            $post = [
                'name'  => $this->input->post('name'),
                'email' => $this->input->post('email')
            ];
            
            $id = $this->main->add($post, 'newsletter');

            flashMsg($id, "Response Added Successfully.", "Response Not Added. Try again.", '');
        }
    }

    public function blogs()
    {
        $data['title'] = 'home';
        $data['name'] = 'home';
        $cats = $this->main->getall('blog_category', 'id, cat_name, cat_slug, CONCAT("'.assets('images/blog-category/').'", cat_image) cat_image, background, cat_color', ['is_deleted' => 0], 'id ASC');
        foreach ($cats as $k => $v) 
            // $cats[$k]['blogs'] = $this->main->getall('blog', 'title, blog_slug, LEFT (details, 70) details, CONCAT("'.assets('blog/').'", image) image, CONCAT("'.assets('blog/').'", audio) audio', ['is_deleted' => 0], 'id DESC', '5');
            $cats[$k]['blogs'] = $this->main->getall('blog', 'title, blog_slug, LEFT (details, 70) details, CONCAT("'.assets('blog/').'", image) image, CONCAT("'.assets('blog/').'", blogger_image) blogger_image, CONCAT("'.assets('blog/').'", audio) audio', ['is_deleted' => 0, 'cat_id' => $v['id']], 'id DESC', '5');
        
        $data['cats'] = $cats;

        return $this->template->load(front('template'), front('blogs'), $data);
    }

    public function join_us($vendor_error='')
    {
        $data['title'] = 'Join us';
        $data['name'] = 'Join us';
        $data['vendor_error'] = $vendor_error;
        return $this->template->load(front('template'), front('join_us'), $data);
    }

    public function join_us_post()
    {
        $validate = [
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required"
                ]
            ],
            [
                'field' => 'phone',
                'label' => 'Contact number',
                'rules' => 'required|numeric|exact_length[10]',
                'errors' => [
                    'required' => "%s is Required",
                    'numeric' => "%s is Invalid",
                    'exact_length' => "%s is Invalid",
                ]
            ],
            [
                'field' => 'email',
                'label' => 'Email Id',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required"
                ]
            ],
            [
                'field' => 'street',
                'label' => 'Society / Appartment No.',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required"
                ]
            ],
            [
                'field' => 'nearbyplace',
                'label' => 'Nearby places or landmark',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required"
                ]
            ],
            [
                'field' => 'city',
                'label' => 'City',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required"
                ]
            ],
            [
                'field' => 'pincode',
                'label' => 'Pincode',
                'rules' => 'required|numeric|exact_length[6]',
                'errors' => [
                    'required' => "%s is Required",
                    'numeric' => "%s is Invalid",
                    'exact_length' => "%s is Invalid",
                ]
            ],
            [
                'field' => 'book_qty',
                'label' => 'Book quanitity',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required"
                ]
            ],
            [
                'field' => 'paymentmode',
                'label' => 'Payment mode',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required"
                ]
            ]
        ];

        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == FALSE) {
            return $this->join_us();
        }else{
            $venId = $this->input->post('vendorid');
            if ($venId)
            {
                $venId = $this->main->check('vendor', ['ven_code' => $venId], 'id');
                if (!$venId)
                    return $this->join_us('<strong class="text-danger" style="font-size: 0.8rem;">* Invalid Vendor ID</strong>');
            }
            
            $pay_mode = ($this->input->post('paymentmode') === 'onlinepay') ? 'Online Payment' : 'Offline Payment';
            $post = [
                'name'       => $this->input->post('name'),
                'mobile'     => $this->input->post('phone'),
                'society'    => $this->input->post('street'),
                'landmark'   => $this->input->post('nearbyplace'),
                'city'       => $this->input->post('city'),
                'pincode'    => $this->input->post('pincode'),
                'vendor_id'  => $venId,
                'quantity'   => $this->input->post('book_qty'),
                'pay_mode'   => $pay_mode,
                'price'      => 300,
                'email'      => $this->input->post('email'),
                'created_at' => date('Y-m-d H:i:s')
            ];
            
            if ($this->input->post('paymentmode') !== 'onlinepay') {
                $id = $this->main->add($post, 'book_purchase');
                flashMsg($id, "Book Purchased Successfully.", "Book Not Purchased. Try again.", 'join-us');
            }else{
                $this->load->helper('string');

                /*creds for sandbox : gujaratniamirat@gmail.com pass - dVmpD6mi*/
                /*$obj = new Payment('803478420583379', 'D9BF0722FA173CE9030EE7C87AF8E297', '53D24E46380C0487016F3F90E8C69A00', false);*/
                /*end sandbox*/

                /*creds for live : gujaratniamirat@gmail.com pass - Gujarat@12345*/
                $obj = new Payment('777268813863305', '7CD6A33880441935D75F513DC5BE12DF', '36F6CB4369770D80947F1F502706A171', true);
                /*end live*/

                // Initializing Order
                $obj->initOrder(random_string('nozero', 11), $post['name'], ($post['quantity'] * 300), base_url('success-payment'), base_url('error-payment'), 'INR');
                 
                // Add Customer
                $obj->addCustomer($post['name'], $post['email'], $post['mobile']);
                 
                // Add Shipping address
                $obj->addShippingAddress('India', $post['landmark'], $post['city'], $post['pincode'], $post['society']);
                 
                // Add Billing Address
                $obj->addBillingAddress('India', $post['landmark'], $post['city'], $post['pincode'], $post['society']);
                $this->session->set_flashdata($post);
                echo $obj->submit();
                die();
            }
        }
    }

    public function inside_book($book)
    {
        $books = ['gujarat','history','tour','festival','sorath','kutchh','girnar','culture'];
        if (in_array($book, $books)) {
            switch ($book) {
                case 'gujarat':
                    $data['title'] = 'ગુજરાત';
                    $data['name'] = 'gujarat';
                    break;
                case 'history':
                    $data['title'] = 'ઈતિહાસ';
                    $data['name'] = 'history';
                    break;
                case 'tour':
                    $data['title'] = 'પર્યટન';
                    $data['name'] = 'tour';
                    break;
                case 'festival':
                    $data['title'] = 'ઉત્સવ-પરંપરા';
                    $data['name'] = 'festival';
                    break;
                case 'sorath':
                    $data['title'] = 'સૌરાષ્ટ્ર';
                    $data['name'] = 'sorath';
                    break;
                case 'kutchh':
                    $data['title'] = 'કચ્છ';
                    $data['name'] = 'kutchh';
                    break;
                case 'girnar':
                    $data['title'] = 'ગીરનાર';
                    $data['name'] = 'girnar';
                    break;
                case 'culture':
                    $data['title'] = 'સાહિત્ય';
                    $data['name'] = 'culture';
                    break;
            }

            return $this->template->load(front('template'), front('inside_book'), $data);
        }
        else
            return $this->load->view('error_404');
    }

    public function nation()
    {
        $data['title'] = 'nation';
        $data['name'] = 'nation';

        return $this->template->load(front('template'), front('nation'), $data);
    }

    public function nation_post()
    {
        $validate = [
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required"
                ]
            ],
            [
                'field' => 'phone',
                'label' => 'Phone number',
                'rules' => 'required|numeric|exact_length[10]',
                'errors' => [
                    'required' => "%s is Required",
                    'numeric' => "%s is Invalid",
                    'exact_length' => "%s is Invalid",
                ]
            ],
            [
                'field' => 'email',
                'label' => 'Email Id',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required"
                ]
            ]
        ];

        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == FALSE) {
            return $this->nation();
        }else{
            $post = [
                'name'  => $this->input->post('name'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email')
            ];
            
            $id = $this->main->add($post, 'nation');

            flashMsg($id, "Response Added Successfully.", "Response Not Added. Try again.", 'nation');
        }
    }

    public function gallery()
    {
        $data['title'] = 'gallery';
        $data['name'] = 'gallery';
        $data['gallery'] = $this->main->getall('gallery', 'CONCAT("'.assets('images/gallery/').'", image) image, details', ['is_deleted' => 0]);
        $data['gallery'] = array_chunk($data['gallery'], 3);
        
        return $this->template->load(front('template'), front('gallery'), $data);
    }

    public function upcoming()
    {
        $data['title'] = 'upcoming books';
        $data['name'] = 'upcoming books';
        
        return $this->template->load(front('template'), front('upcoming'), $data);
    }

    public function bio_world()
    {
        $data['title'] = 'bio world';
        $data['name'] = 'bio world';
        
        return $this->template->load(front('template'), front('bio_world'), $data);
    }

    public function terms()
    {
        $data['title'] = 'terms & conditions';
        $data['name'] = 'terms';
        
        return $this->template->load(front('template'), front('terms'), $data);
    }

    public function about()
    {
        $data['title'] = 'about';
        $data['name'] = 'about';
        
        return $this->template->load(front('template'), front('about'), $data);
    }

    public function refund()
    {
        $data['title'] = 'refund';
        $data['name'] = 'refund';
        
        return $this->template->load(front('template'), front('refund'), $data);
    }

    public function contact()
    {
        $data['title'] = 'contact';
        $data['name'] = 'contact';
        
        return $this->template->load(front('template'), front('contact'), $data);
    }

    public function bio_world_post()
    {
        $validate = [
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required"
                ]
            ],
            [
                'field' => 'phone',
                'label' => 'Phone number',
                'rules' => 'required|numeric|exact_length[10]',
                'errors' => [
                    'required' => "%s is Required",
                    'numeric' => "%s is Invalid",
                    'exact_length' => "%s is Invalid",
                ]
            ],
            [
                'field' => 'email',
                'label' => 'Email Id',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required"
                ]
            ]
        ];

        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == FALSE) {
            return $this->bio_world();
        }else{
            $post = [
                'name'  => $this->input->post('name'),
                'mobile' => $this->input->post('phone'),
                'email' => $this->input->post('email')
            ];
            
            $id = $this->main->add($post, 'bio_world');

            flashMsg($id, "Response added Successfully.", "Response Not Added. Try again.", 'bio-world');
        }
    }

    public function you_can_write($slug='')
    {
        $this->load->model('write_model');
        $blog = $this->write_model->getBlogs($slug);
        
        if ($blog)
            switch ($blog) {
                case $this->is_multi_array( $blog ):
                    $data['title'] = 'you can write';
                    $data['name'] = 'you can write';
                    $data['blogs'] = $blog;
                    return $this->template->load(front('template'), front('you_can_write'), $data);
                    break;

                case !$this->is_multi_array( $blog ):
                    $data['title'] = $blog['title'];
                    $data['name'] = $blog['title'];
                    $data['blog'] = $blog;
                    return $this->template->load(front('template'), front('you_can_write_blog'), $data);
                    break;
            }
        else
            if (!$slug) {
                $data['title'] = 'you can write';
                $data['name'] = 'you can write';
                $data['blogs'] = $blog;
                return $this->template->load(front('template'), front('you_can_write'), $data);
            }
            else
                return $this->load->view('error_404');
    }

    public function you_can_write_post()
    {
        $validate = [
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required"
                ]
            ],
            [
                'field' => 'phone',
                'label' => 'Phone number',
                'rules' => 'required|numeric|exact_length[10]',
                'errors' => [
                    'required' => "%s is Required",
                    'numeric' => "%s is Invalid",
                    'exact_length' => "%s is Invalid",
                ]
            ],
            [
                'field' => 'email',
                'label' => 'Email Id',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required"
                ]
            ],
            [
                'field' => 'topic',
                'label' => 'Topic',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required"
                ]
            ],
            [
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required"
                ]
            ],
            [
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required"
                ]
            ]
        ];

        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == FALSE) {
            return $this->you_can_write();
        }else{
            $post = [
                'name'  => $this->input->post('name'),
                'mobile' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'image' => $this->uploadImage(),
                'topic' => $this->input->post('topic'),
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'blog_slug' => strtolower(str_replace(" ", '-', $this->input->post('title'))),
                'created_at' => date('Y-m-d H:i:s')
            ];
            
            $id = $this->main->add($post, 'you_can_write');

            flashMsg($id, "આપશ્રીએ રજૂ કરેલ રાષ્ટ્રલક્ષી વિચાર ને YOU CAN WRITE page ના latest post પરથી અન્ય મિત્રોને share કરી શકશો. આ સાથેજ અભિયાનમાં જોડાવા અન્યને પણ પ્રેરણા આપી શકો છો. આપનું certificate ટૂંક સમયમાં આપના mail.i.d પર મળશે. આભાર", "Response Not Added. Try again.", 'you-can-write');
        }
    }

    protected function uploadImage($unlink='')
    {
        if (!empty($_FILES['file']['name'])) {

            $config = [
                'upload_path'      => "./assets/blog/",
                'allowed_types'    => 'jpg|jpeg|png',
                'file_name'        => time(),
                'file_ext_tolower' => TRUE
            ];

            if ($unlink && $unlink != 'gujaratniamirat.png' && file_exists($config['upload_path'].$unlink))
                unlink($config['upload_path'].$unlink);

            $this->upload->initialize($config);
            
            if ($this->upload->do_upload("file"))
                return $this->upload->data("file_name");
            else
                return 'gujaratniamirat.png';
        }else {
            return 'gujaratniamirat.png';
        }
    }

    public function interview($slug='')
    {
        $this->load->model('interview_model', 'interview');
        $interview = $this->interview->getInterview($slug);
        
        if ($interview)
            switch ($interview) {
                case $this->is_multi_array( $interview ):
                    $data['title'] = 'interview';
                    $data['name'] = 'interview';
                    $data['interviews'] = $interview;
                    return $this->template->load(front('template'), front('interview_list'), $data);
                    break;

                case !$this->is_multi_array( $interview ):
                    $data['title'] = $interview['title'];
                    $data['name'] = $interview['title'];
                    $data['interview'] = $interview;
                    return $this->template->load(front('template'), front('interview'), $data);
                    break;
            }
        else
            if (!$slug) {
                $data['title'] = 'interview';
                $data['name'] = 'interview';
                $data['interviews'] = $interview;
                return $this->template->load(front('template'), front('interview_list'), $data);
            }
            else
                return $this->load->view('error_404');
    }

    public function blog($slug)
    {
        $this->load->model('blog_model', 'blog');
        $blog = $this->blog->getBlogs($slug);
        $data['blogs'] = $blog;
        $data['cats'] = $this->main->getall('blog_category', 'id, cat_name, cat_slug, CONCAT("'.assets('images/blog-category/').'", cat_image) cat_image, background', ['is_deleted' => 0], 'id ASC');
        
        if ($blog) {
            switch ($blog) {
                case $this->is_multi_array( $blog ):
                    $data['cat'] = $this->main->get('blog_category', 'cat_name, background, cat_color', ['cat_slug' => $slug]);
                    
                    $data['title'] = $data['cat']['cat_name'];
                    $data['name'] = $data['cat']['cat_name'];
                    return $this->template->load(front('template'), front('cat_blogs'), $data);
                    break;

                case !$this->is_multi_array( $blog ):
                    $data['title'] = $blog['title'];
                    $data['name'] = $blog['title'];
                    $data['single_blog'] = $this->db->select(['title', 'CONCAT("'.assets('blog/').'", image) image', 'sub_title', 'blog_slug', 'CONCAT("'.assets('blog/').'", blogger_image) blogger_image'])
                        ->from('blog')
                        ->where(['is_deleted' => 0])
                        ->order_by('RAND()')
                        ->get()
                        ->row_array();
                    return $this->template->load(front('template'), front('blog'), $data);
                    break;
            }
        } else{
            $data['cat'] = $this->main->get('blog_category', 'cat_name, background, cat_color', ['cat_slug' => $slug]);
            if ($data['cat']) {
                $data['title'] = $data['cat']['cat_name'];
                $data['name'] = $data['cat']['cat_name'];
                return $this->template->load(front('template'), front('cat_blogs'), $data);
            }else
                return $this->load->view('error_404');
        }
    }

    public function save_token() 
    { 
        $post = [
            'token' => $this->input->post('token'),
            'cdate' => date('Y-m-d')
        ];

        if (!$this->main->check('tokens', ['token' => $post['token']], 'id')) 
            $this->main->add($post, 'tokens');
    }

    public function success_payment() 
    { 
        $post = [
                'name'       => $this->session->name,     
                'mobile'     => $this->session->mobile,
                'society'    => $this->session->society,
                'landmark'   => $this->session->landmark,
                'city'       => $this->session->city,
                'pincode'    => $this->session->pincode,
                'vendor_id'  => $this->session->vendor_id,
                'quantity'   => $this->session->quantity,
                'pay_mode'   => $this->session->pay_mode,
                'price'      => $this->session->price,
                'email'      => $this->session->email,
                'created_at' => $this->session->created_at,
                'pay_id'     => $this->input->get('payment-id')
            ];
           
        $id = $this->main->add($post, 'book_purchase');
        $data['title'] = "payment Success";
        $data['name'] = "payment Success";
        $data['payType'] = "Success";
        $data['message'] = ($id) ? "Book Purchased Successfully." : "Book Not Purchased. Save this Transaction ID for future use if amount debited from your bank.";

        return $this->template->load(front('template'), front('payment'), $data);
    }

    public function error_payment() 
    { 
        $data['title'] = "payment Error";
        $data['name'] = "payment Error";
        $data['payType'] = "Failed";
        $data['message'] = "Save this Transaction ID for future use if amount debited from your bank.";

        return $this->template->load(front('template'), front('payment'), $data);
    }

    public function is_multi_array( $arr ) { 
        if ($arr)
        rsort( $arr );
        return isset( $arr[0] ) && is_array( $arr[0] ); 
    } 
}