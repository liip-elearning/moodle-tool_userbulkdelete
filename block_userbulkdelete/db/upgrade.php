<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
defined('MOODLE_INTERNAL') || die();

/**
 * Upgrade script for block_userbulkdelete
 *
 * @package    block_userbulkdelete
 * @copyright  2019 Liip
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
function xmldb_block_userbulkdelete_upgrade() {
    global $DB;

    $result = true;

    // If the block has no instance, create it!
    $binstance = $DB->get_record_select('block_instances', "blockname = 'userbulkdelete' ");
    if (!$binstance) {
        // Create a dummy page object referring to user_bulk page & adding the block.
        $pagebulk = new moodle_page();
        $pagebulk->set_pagetype('admin-user-user_bulk');
        $pagebulk->set_pagelayout('admin');
        $pagebulk->set_context(null);
        $pagebulk->blocks->add_region('side-pre');
        $pagebulk->blocks->add_block('userbulkdelete', 'side-pre', 3, 1);
    }

    return $result;
}