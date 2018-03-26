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

/**
 * Block base class.
 *
 * @package    block
 * @subpackage booking
 * @author     David Bogner <info@edulabs.org>
 * @copyright  2014 www.edulabs.org
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_booking extends block_base {

    public function init() {
        $this->blockname = get_class($this);
        $this->title   = get_string('title', 'block_booking');
    }

    function applicable_formats() {
        return array('all' => true);
    }

    public function get_content() {
        global $USER, $CFG, $COURSE;

        if ($this->content !== null) {
            return $this->content;
        }

        $this->content = new stdClass();
        $this->content->text = '';
        $this->content->footer = '';

        $this->content->text .= '<ul>';
        $this->content->text .= '<li>';
        $this->content->text .= '<a href="'.$CFG->wwwroot.'/blocks/booking/booking.php?courseid='.$COURSE->id .'">';
        $this->content->text .= get_string('booking:viewallbookings', 'block_booking');
        $this->content->text .= '</a>';
        $this->content->text .= '</li>';
        $this->content->text .= '</ul>';

        return $this->content;
    }

    public function has_config() {
        return false;
    }
}