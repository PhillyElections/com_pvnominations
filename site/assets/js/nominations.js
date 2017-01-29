window.addEvent('domready', function() {
    var $wrapper=$('candidate_party_wrapper'),
        $select=$('candidate_party'),
        $input=$('candidate_party_full');

    // transition from hidden property to mootools fade('out')
    $wrapper.fade('out');

    // wire up our event
    $select.addEvent('change', function() {
        if (this.value=='Other') {
            if ($input) {
                $wrapper.fade('in');
            } else {
                $wrapper.set('html','&nbsp;<input type="text" id="candidate_party_full" name="candidate_party_full" size="37%" value="" class="inputbox " maxlength="60" placeholder="Please specify (not Democratic or Republican)" />');
                $input=$('candidate_party_full');
                $wrapper.fade('in');
            }
        } else {
            if ($input) {
                $input.value='';
                $wrapper.fade('out');
            }
        }
    });
});
