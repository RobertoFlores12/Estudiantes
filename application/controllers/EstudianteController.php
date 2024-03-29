<?php
defined('BASEPATH') or exit('No direct script access allowed');
class EstudianteController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("/");
        }
    }
    public function index()
    {
        $this->load->model('Estudiante_model');
        $data = array(
            "records" => $this->Estudiante_model->getAll(),
        );
        
        $this->load->view("shared/header", $data);
        $this->load->view("estudiantes/index", $data);
        $this->load->view("shared/footer", $data);
    }
    public function insertar()
    {
        $this->load->model('Carrera_model');
        $data = array(
            "carreras" => $this->Carrera_model->getAll(),
        );
        
        $this->load->view("shared/header", $data);
        $this->load->view("estudiantes/add_edit", $data);
        $this->load->view("shared/footer", $data);
    }
    public function add()
    {

        // Reglas de validación del formulario
        /*
        required: indica que el campo es obligatorio.
        min_length: indica que la cadena debe tener al menos una cantidad determinada de caracteres.
        max_length: indica que la cadena debe tener como máximo una cantidad determinada de caracteres.
        valid_email: indica que el valor debe ser un correo con formato válido.
         */
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules("idestudiante", "Id Estudiante", "required|min_length[12]|max_length[12]|is_unique[estudiantes.idestudiante]");
        $this->form_validation->set_rules("nombre", "Nombre", "required|max_length[100]");
        $this->form_validation->set_rules("apellido", "Apellido", "required|max_length[100]");
        $this->form_validation->set_rules("email", "Email", "required|valid_email|max_length[100]|is_unique[estudiantes.email]");
        $this->form_validation->set_rules("usuario", "Usuario", "required|max_length[100]|is_unique[estudiantes.usuario]");
        $this->form_validation->set_rules("idcarrera", "Carrera", "required|max_length[3]");

        // Modificando el mensaje de validación para los errores
        $this->form_validation->set_message('required', 'El campo %s es requerido.');
        $this->form_validation->set_message('min_length', 'El campo %s debe tener al menos %s caracteres.');
        $this->form_validation->set_message('max_length', 'El campo %s debe tener como máximo %s caracteres.');
        $this->form_validation->set_message('valid_email', 'El campo %s no es un correo válido.');
        $this->form_validation->set_message('is_unique', 'El campo %s ya existe.');

        // Parámetros de respuesta
        header('Content-type: application/json');
        $statusCode = 200;
        $msg = "";

        // Se ejecuta la validación de los campos
        if ($this->form_validation->run()) {
            // Si la validación es correcta entra acá
            try {
                $this->load->model('Estudiante_model');
                $data = array(
                    "idestudiante" => $this->input->post("idestudiante"),
                    "nombre" => $this->input->post("nombre"),
                    "apellido" => $this->input->post("apellido"),
                    "email" => $this->input->post("email"),
                    "usuario" => $this->input->post("usuario"),
                    "idcarrera" => $this->input->post("idcarrera"),
                );
                $rows = $this->Estudiante_model->insert($data);
                if ($rows > 0) {
                    $msg = "Información guardada correctamente.";
                } else {
                    $statusCode = 500;
                    $msg = "No se pudo guardar la información.";
                }
            } catch (Exception $ex) {
                $statusCode = 500;
                $msg = "Ocurrió un error." . $ex->getMessage();
            }
        } else {
            // Si la validación da error, entonces se ejecuta acá
            $statusCode = 400;
            $msg = "Ocurrieron errores de validación.";
            $errors = array();
            foreach ($this->input->post() as $key => $value) {
                $errors[$key] = form_error($key);
            }
            $this->data['errors'] = $errors;
        }
        // Se asigna el mensaje que llevará la respuesta
        $this->data['msg'] = $msg;
        // Se asigna el código de Estado HTTP
        $this->output->set_status_header($statusCode);
        // Se envía la respuesta en formato JSON
        echo json_encode($this->data);

    }
    public function update()
    {

        // Reglas de validación del formulario
        $this->form_validation->set_error_delimiters('', '');
        /*
        required: indica que el campo es obligatorio.
        min_length: indica que la cadena debe tener al menos una cantidad determinada de caracteres.
        max_length: indica que la cadena debe tener como máximo una cantidad determinada de caracteres.
        valid_email: indica que el valor debe ser un correo con formato válido.
         */
        $this->form_validation->set_rules("idestudiante", "Id Estudiante", "required|min_length[12]|max_length[12]");
        $this->form_validation->set_rules("nombre", "Nombre", "required|max_length[100]");
        $this->form_validation->set_rules("apellido", "Apellido", "required|max_length[100]");
        $this->form_validation->set_rules("email", "Email", "required|valid_email|max_length[100]");
        $this->form_validation->set_rules("usuario", "Usuario", "required|max_length[100]");
        $this->form_validation->set_rules("idcarrera", "Carrera", "required|max_length[3]");

        // Modificando el mensaje de validación para los errores, en este caso para
        // la regla required, min_length, max_length
        $this->form_validation->set_message('required', 'El campo %s es requerido.');
        $this->form_validation->set_message('min_length', 'El campo %s debe tener al menos %s caracteres.');
        $this->form_validation->set_message('max_length', 'El campo %s debe tener como máximo %s caracteres.');
        $this->form_validation->set_message('is_unique', 'El campo %s ya existe.');

        // Parámetros de respuesta
        header('Content-type: application/json');
        $statusCode = 200;
        $msg = "";

        // Se ejecuta la validación de los campos
        if ($this->form_validation->run()) {
            // Si la validación es correcta entra
            try {
                $this->load->model('Estudiante_model');
                $data = array(
                    "idestudiante" => $this->input->post("idestudiante"),
                    "nombre" => $this->input->post("nombre"),
                    "apellido" => $this->input->post("apellido"),
                    "email" => $this->input->post("email"),
                    "usuario" => $this->input->post("usuario"),
                    "idcarrera" => $this->input->post("idcarrera"),
                );
                $rows = $this->Estudiante_model->update($data, $this->input->post("PK_estudiante"));
                $msg = "Información guardada correctamente.";
            } catch (Exception $ex) {
                $statusCode = 500;
                $msg = "Ocurrió un error." . $ex->getMessage();
            }
        } else {
            // Si la validación da error, entonces se ejecuta acá
            $statusCode = 400;
            $msg = "Ocurrieron errores de validación.";
            $errors = array();
            foreach ($this->input->post() as $key => $value) {
                $errors[$key] = form_error($key);
            }
            $this->data['errors'] = $errors;
        }
        // Se asigna el mensaje que llevará la respuesta
        $this->data['msg'] = $msg;
        // Se asigna el código de Estado HTTP
        $this->output->set_status_header($statusCode);
        // Se envía la respuesta en formato JSON
        echo json_encode($this->data);
    }
    public function eliminar($id)
    {
        $this->load->model('Estudiante_model');
        $result = $this->Estudiante_model->delete($id);
        if ($result) {
            $this->session->set_flashdata('success', "Registro borrado correctamente.");
        } else {
            $this->session->set_flashdata('error', "No se pudo borrar el registro.");
        }
        redirect("EstudianteController");
    }
    public function modificar($id)
    {
        $this->load->model('Carrera_model');
        $this->load->model('Estudiante_model');
        $estudiante = $this->Estudiante_model->getById($id);
        $data = array(
            "carreras" => $this->Carrera_model->getAll(),
            "estudiante" => $estudiante,
        );
        $this->load->view("estudiantes/add_edit", $data);
    }


    //Funcion para crear reporte pdf
    public function reporte_todos_los_estudiantes()
    {
        // Se carga la libreria para generar tablas
        $this->load->library("table");
        //Carga la librería Report que acabamos de crear
        $this->load->library('Report');

        $pdf = new Report(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->titulo = "Listado de Estudiantes";
        // Información del documento
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle('Listado de Estudiantes');
        $pdf->SetSubject('Report generado usando Codeigniter y TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

        // Fuente de encabezado y pie de página
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // Fuente por defecto Monospaced
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // Margenes
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(15);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // Quiebre de página automático
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

        // Factor de escala de imagen
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // Fuente del contenido
        $pdf->SetFont('Helvetica', '', 10);

        // ================================================

        // Generar la tabla y su información
        $template = array(
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1">',
            'heading_cell_start' => '<th style="font-weight: bold; color:white; background-color: #13CDF7">',
        );

        $this->table->set_template($template);

        $this->table->set_heading('Id Estudiante', 'Nombre', 'Apellido', 'Email', 'Carrera', 'Usuario');

        // Cargando la data
        $this->load->model('Estudiante_Model');
        // Asignando la data
        $estudiantes = $this->Estudiante_Model->getAll();

        // Iterando sobre la data
        foreach ($estudiantes as $estudiante) :
            $this->table->add_row($estudiante->idestudiante, $estudiante->nombre, $estudiante->apellido, $estudiante->email, $estudiante->carrera, $estudiante->usuario);
        endforeach;

        // Generar la información de la tabla
        $html = $this->table->generate();


        // Añadir página
        $pdf->AddPage();

        // Contenido de salida en HTML
        $pdf->writeHTML($html, true, false, true, false, '');

        // Reiniciar puntero a la última página
        $pdf->lastPage();

        // Cerrar y mostrar el reporte
        $pdf->Output(md5(time()) . '.pdf', 'I');
    }
    // FIN - FUNCIONES QUE REALIZAN OPERACIONES /////////////////////////////////////////////////////////

}
