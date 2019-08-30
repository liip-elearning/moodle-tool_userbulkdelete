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
 * Uninstall script for block_userbulkdelete
 *
 * @package    block_userbulkdelete
 * @copyright  2019 Liip
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
function xmldb_block_userbulkdelete_uninstall() {
    global $DB;

    // Delete all the block instances!
    $binstance = $DB->get_record_select('block_instances', "blockname = 'userbulkdelete'");
    if ($binstance) {
        blocks_delete_instance($binstance);
    }

    return true;
}

