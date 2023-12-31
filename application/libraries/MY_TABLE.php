<?php
defined("BASEPATH") OR exit("No direct script access allowed");
class MY_TABLE extends CI_Table{
    protected function _default_template()
	{
		return array(
			'table_open'		=> '<table border="2" cellpadding="4" cellspacing="0">',

			'thead_open'		=> '<thead>',
			'thead_close'		=> '</thead>',

			'heading_row_start'	=> '<tr bgcolor="orange">',
			'heading_row_end'	=> '</tr>',
			'heading_cell_start'	=> '<th>',
			'heading_cell_end'	=> '</th>',

			'tbody_open'		=> '<tbody>',
			'tbody_close'		=> '</tbody>',

			'row_start'		=> '<tr bgcolor="#58eb34">',
			'row_end'		=> '</tr>',
			'cell_start'		=> '<td>',
			'cell_end'		=> '</td>',

			'row_alt_start'		=> '<tr bgcolor="#f74db3">',
			'row_alt_end'		=> '</tr>',
			'cell_alt_start'	=> '<td style="color: white;">',
			'cell_alt_end'		=> '</td>',

			'table_close'		=> '</table>'
		);
	}
}
