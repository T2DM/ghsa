<?php
/**
 * @file
 * Contains \Drupal\ghsa_dev\Controller\HelloController.
 */

namespace Drupal\ghsa_dev\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Symfony\Component\DependencyInjection\ContainerInterface;

class CreateDemoStateLaws extends ControllerBase {

  private $html_array;

  public function content() {
    // Get all the terms in the 'issue' vocabulary
    $issue_tree = $this->entityTypeManager()->getStorage('taxonomy_term')->loadTree('issue');
    $state_tree = $this->entityTypeManager()->getStorage('taxonomy_term')->loadTree('state');;

    foreach($state_tree as $state_term) {
      $state_tid = $state_term->tid;
      foreach ($issue_tree as $issue_term) {
        $issue_tid = $issue_term->tid;
        // Generate some nodes then return some markup
        $new_node = Node::create([
          'nid' => NULL,
          'type' => 'state_laws',
          'title' => $issue_term->name . ': ' . $state_term->name,
          'uid' => 1,
          'status' => TRUE
        ]);
        $new_node->set('field_state_ref', [$state_tid]);
        $new_node->set('field_issue_ref', [$issue_tid]);

        $html = $this->get_html($issue_term->name);
        $new_node->body = array(
          'value' => $html,
          'summary' => 'Some summary...',
          'format' => 'full_html'
        );
        $new_node->moderation_state = 'published';
        $new_node->save();
        $new_node->title = $issue_term->name . ': ' . $state_term->name. ': ' . $new_node->id();
        $new_node->save();
        $nodes[$state_tid][$issue_tid] = $new_node;
      }
    }
    return array(
      '#type' => 'markup',
      '#markup' => $this->t('Created this many nodes: ' . count($nodes)),
    );
  }

  private function get_html($issue) {
    $html['Child Passenger Safety'] = '
    <table class="stack hover table-scroll">
  <tbody>
            <tr>
              <td>Child Restraint Required<br>
                <em>unless indicated, # refers to Yrs.(Lbs.)</em></td>
              <td>Adult Safety Belt Permissible<br>
              <em>unless indicated, # refers to Yrs.(Lbs.)</em></td>
              <td>Maximum Fine <br>
              1st Offense</td>
            </tr> 
            <tr> 
            <td><u>&lt;</u>7; children in rear-facing devices must be in a rear seat if available - otherwise, in front only if front passenger airbag is deactivated</td>
            <td>8 - 17 (4 - 7 with physician\'s exemption)</td>
            <td> $50</td>
         </tr>
    </tbody></table>';

    $html['Aggressive Driving'] = '
    <table class="stack hover tabel-scroll">
  <tbody> 
          <tr>
            <td>Aggressive Driver Actions Defined by Statute</td> 
            <td>Comments</td> 
          </tr> 
          <tr>
            <td>Is a hazard to others with the intent to
      harass, intimidate, injure or obstruct another person while committing
      at least one of the following: failure to drive on the right
      side of highway, driving outside of marked lanes,
      following too closely, failure to yield or stop before entering roadway, failure
      to obey traffic control device, passing when overtaking a vehicle, passing on right, failure to yield right of way, speeding, stopping
      on a highway.</td>
    <td>&nbsp;</td>
          </tr>
    </tbody></table>
    ';
    $html['distracted'] = '
    <table class="stack hover table-scroll">
          <tbody>
          <tr>
            <td width="13%" rowspan="2">Hand-held Ban</td>
            <td colspan="2">All Cell Phone Ban</td>
            <td colspan="3">Text Messaging Ban</td>
            <td width="8%" rowspan="2">Crash<br>
              Data</td>
          </tr>
          <tr>
            <td width="15%">School Bus Drivers</td>
            <td width="14%">Novice Drivers</td>
            <td width="13%">All Drivers</td>
            <td width="18%">School Bus Drivers</td>
            <td width="19%">Novice Drivers</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>Yes<br>
            (Primary)</td>
            <td>&lt;18<br>
            (Secondary)</td>
            <td>Yes<br>
(Primary)</td>
            <td colspan="2">Covered under all driver ban</td>
            <td>Yes</td>
          </tr>
        </tbody></table>';
    $html['gdl'] = '
  <tbody>
  <tr>
    <td rowspan="2">Inc. Penalty for High BAC</td>
    <td rowspan="2">Admin. License Susp. on
      1st Offense</td>
    <td rowspan="2">Limited Driving Privileges During Susp.</td>
    <td rowspan="2">Ignition Interlocks</td>
    <td rowspan="2">Vehicle and License Plate Sanctions</td>
    <td><div"><a href="/html/stateinfo/programs/154.html">Open Container
      Laws*</a></div></td>
    <td><div><a href="/html/stateinfo/programs/164.html">Repeat Offender Laws*</a></div></td>
    <td rowspan="2">Alcohol Exclusion
      Laws Limiting Treatment</td>
  </tr>
  <tr>
    <td colspan="2">*Meeting Federal Requirements</td>
  </tr>
  <tr>
    <td>.15 and .20</td>
    <td> 7 days</td>
    <td>&nbsp;</td>
    <td>Mandatory for all convictions</td>
    <td>Vehicle confiscation</td>
    <td>&nbsp;</td>
    <td> Yes</td>
    <td> Yes</td>
    </tr>
</tbody></table>';
    $html['Drunk Driving'] = '
    <table class="stack hover table-scroll">
  <tbody>
  <tr>
    <td rowspan="2">Inc. Penalty for High BAC</td>
    <td rowspan="2">Admin. License Susp. on
      1st Offense</td>
    <td rowspan="2">Limited Driving Privileges During Susp.</td>
    <td rowspan="2">Ignition Interlocks</td>
    <td rowspan="2">Vehicle and License Plate Sanctions</td>
    <td><div id="tableheaderstate"><a href="/html/stateinfo/programs/154.html">Open Container
      Laws*</a></div></td>
    <td><div id="tableheaderstate"><a href="/html/stateinfo/programs/164.html">Repeat Offender Laws*</a></div></td>
    <td rowspan="2">Alcohol Exclusion
      Laws Limiting Treatment</td>
  </tr>
  <tr>
    <td colspan="2">*Meeting Federal Requirements</td>
  </tr>
  <tr>
    <td>.15 and .20</td>
    <td> 7 days</td>
    <td>&nbsp;</td>
    <td>Mandatory for all convictions</td>
    <td>Vehicle confiscation</td>
    <td>&nbsp;</td>
    <td> Yes</td>
    <td> Yes</td>
    </tr>
</tbody></table>';
    $html['Drug Impaired Driving'] = '
    <table class="stack hover table-scroll">
  <tbody> 
<tr>
            <td rowspan="2">DUID Zero Tolerance or <em>Per se</em> Laws for Some Drugs</td> 
            <td colspan="3">Marijuana-Specific</td> 
      </tr>
          
<tr>
            <td height="40">Possession &amp; Use Laws</td>
            <td>Impaired Driving Laws</td>
</tr>
<tr>
  <td><em>Per se</em> &gt;0 for some drugs</td>
  <td>Illegal</td>
  <td>None</td>
  </tr>
        </tbody></table>
        ';
    $html['test'] = '
        <table class="stack hover table-scroll">
            <tbody> 
                <tr>
                    <td rowspan="2">DUID Zero Tolerance or <em>Per se</em> Laws for Some Drugs</td> 
                    <td colspan="2">Marijuana-Specific</td>      
                </tr>
                <tr>
                    <td>Possession &amp; Use Laws</td>
                    <td>Impaired Driving Laws</td>
                </tr>
                
            </tbody>
         </table>
    ';
    if(empty($html[$issue])) {
      $issue = 'Drug Impaired Driving';
    }
    return $html['test'];
  }

}