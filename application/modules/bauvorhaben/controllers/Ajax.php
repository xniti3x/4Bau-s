<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * InvoicePlane
 *
 * @author		InvoicePlane Developers & Contributors
 * @copyright	Copyright (c) 2012 - 2018 InvoicePlane.com
 * @license		https://invoiceplane.com/license.txt
 * @link		https://invoiceplane.com
 */

class Ajax extends Admin_Controller
{



    public $ajax_controller = true;

        public function name_query()
    {
        // Load the model & helper
        $this->load->model('bauvorhaben/mdl_bauvorhaben');

        $response = [];

        // Get the post input
        $query = $this->input->get('query');

        if (empty($query)) {
            echo json_encode($response);
            exit;
        }

        // Search for clients
        $escapedQuery = $this->db->escape_str($query);
        $escapedQuery = str_replace("%", "", $escapedQuery);
        $bauvorhabens = $this->mdl_bauvorhaben
            ->having('bezeichnung LIKE \'' . '%' . $escapedQuery . '%\'')
            ->get()
            ->result();

        foreach ($bauvorhabens as $bv) {
            $response[] = [
                'id' => $bv->id,
                'text' => htmlsc(($bv->bezeichnung)),
            ];
        }

        // Return the results
        echo json_encode($response);
    }

        public function save_preference_permissive_search_clients()
    {
        $this->load->model('mdl_settings');
        $permissiveSearchBauvorhaben = $this->input->get('permissive_search_clients');

        if (!preg_match('!^[0-1]{1}$!', $permissiveSearchBauvorhaben)) {
            exit;
        }

        $this->mdl_settings->save('enable_permissive_search_clients', $permissiveSearchBauvorhaben);
    }


    /**
     * @param null|integer $invoice_id
     */
    public function modal_bauvorhaben_lookups($invoice_id = null)
    {
        $data['bauvorhaben'] = array();
        $this->load->model('bauvorhaben/mdl_bauvorhaben');

        if (!empty($invoice_id)) {
            $data['bauvorhaben'] = $this->mdl_bauvorhaben->get_bauvorhaben_by_invoice_id($invoice_id);
        }
        $data["invoice_id"] = $invoice_id;

        $this->layout->load_view('bauvorhaben/modal_bauvorhaben_lookups', $data);
    }

    public function create()
    {
        $this->load->model('bauvorhaben/mdl_bauvorhaben');
        $this->load->model('invoices/mdl_invoices');
        $invoice_id = $this->input->post("invoice_id");
        $post_bauvorhaben = $this->input->post("tf_bauvorhaben");
        $sql_bauvorhaben_id = $this->mdl_bauvorhaben->create($post_bauvorhaben);
        $this->mdl_invoices->update_invoice_bauvorhaben_id($invoice_id, $sql_bauvorhaben_id);
    }
    public function delete()
    {
        $this->load->model('bauvorhaben/mdl_bauvorhaben');
        $this->mdl_bauvorhaben->delete_by_id($this->input->post("bauvorhaben_id"));
    }
}
