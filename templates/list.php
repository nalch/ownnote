<?php
\OCP\Util::addScript('ownnote', 'script');
// \OCP\Util::addScript('files', 'detailtabview');
// \OCP\Util::addScript('ownnote', 'sharetabview');
\OCP\Util::addScript('ownnote', 'tinymce/tinymce.min');
\OCP\Util::addStyle('ownnote', 'style');

$disableAnnouncement = \OCP\Config::getAppValue ( 'ownnote', 'disableAnnouncement', '' );
$l = OCP\Util::getL10N ('ownnote');

$user = \OCP\User::getUser();

$ocVersionArray = OCP\Util::getVersion();
$ocVersion = "";
$oci = 0;
$ocl = sizeof ($ocVersionArray);
foreach ( $ocVersionArray as $v ) {
	$ocVersion .= $v;
	$oci ++;
	if ($oci < $ocl)
		$ocVersion .= ".";
}

?>
<div id="app">
	<div id="app-navigation">
		<ul id="grouplist">
		</ul>
	</div>
	<div id="app-content">
		<div id="ownnote"></div>
		
<!-- 			<div class="tabsContainer"> -->
<!-- 				<div id="shareTabView" class="tab shareTabView"> -->
<!-- 					<div> -->
<!-- 						<div class="dialogContainer"> -->
<!-- 							<div> -->
<!-- 								<div class="resharerInfoView subView"> -->
<!-- 									<span class="reshare"> -->
<!-- 										<div class="avatar" data-username="nalch" -->
<!-- 											style="height: 32px; width: 32px; color: rgb(255, 255, 255); font-weight: normal; text-align: center; line-height: 32px; font-size: 17.6px; background-color: rgb(116, 219, 231);">N</div> -->
<!-- 										Von nalch mit Ihnen und der Gruppe admin geteilt. -->
<!-- 									</span><br> -->
<!-- 								</div> -->
<!-- 								<label for="shareWith-view14" class="hidden-visually">Teilen</label> -->
<!-- 								<div class="oneline"> -->
<!-- 									<input id="shareWith-view14" -->
<!-- 										class="shareWithField ui-autocomplete-input" type="text" -->
<!-- 										placeholder="Mit Benutzern, Gruppen oder entfernten Benutzern teilen…" -->
<!-- 										autocomplete="off"><span role="status" aria-live="polite" -->
<!-- 										class="ui-helper-hidden-accessible"></span> <span -->
<!-- 										class="shareWithLoading icon-loading-small hidden"></span><a -->
<!-- 										target="_blank" -->
<!-- 										class="icon-info svg shareWithRemoteInfo hasTooltip" -->
<!-- 										href="https://doc.owncloud.org/server/9.1/go.php?to=user-sharing-federated" -->
<!-- 										title="" -->
<!-- 										data-original-title="Mit Benutzern anderer ownClouds unter Verwendung der Syntax benutzername@beispiel.com/owncloud teilen"></a> -->
<!-- 								</div> -->
<!-- 								<div class="shareeListView subView"> -->
<!-- 									<ul id="shareWithList" class="shareWithList"></ul> -->
<!-- 								</div> -->
<!-- 								<div class="linkShareView subView"> -->
<!-- 									<span class="icon-loading-small hidden"></span><input -->
<!-- 										type="checkbox" name="linkCheckbox" id="linkCheckbox-view16" -->
<!-- 										class="checkbox linkCheckbox" value="1"><label -->
<!-- 										for="linkCheckbox-view16">Link teilen</label><br> -->
<!-- 									<label for="linkText-view16" class="hidden-visually">Link</label><input -->
<!-- 										id="linkText-view16" class="linkText hidden" type="text" -->
<!-- 										readonly="readonly" value=""> -->
<!-- 									<div id="linkPass" class="linkPass hidden"> -->
<!-- 										<label for="linkPassText-view16" class="hidden-visually">Passwort</label> -->
<!-- 										<input id="linkPassText-view16" class="linkPassText" -->
<!-- 											type="password" -->
<!-- 											placeholder="Wählen Sie ein Passwort für den öffentlichen Link"> -->
<!-- 										<span class="icon-loading-small hidden"></span> -->
<!-- 									</div> -->
<!-- 								</div> -->
<!-- 								<div class="expirationView subView"></div> -->
<!-- 								<div class="mailView subView"></div> -->
<!-- 								<div class="loading hidden" style="height: 50px"></div> -->
<!-- 							</div> -->
<!-- 						</div> -->
<!-- 					</div> -->
<!-- 				</div> -->
<!-- 			</div> -->
<!-- 			<a class="close icon-close" href="#" alt="Schließen"></a> -->
		<div id="app-sidebar" class="detailsView scroll-container">
			<a class="close icon-close" href="#" alt="Close"></a>		
		</div>
	</div>
	<input type="hidden" name="currentUser" id="currentUser" value="<?php echo $user; ?>">
	<input type="hidden" name="disableAnnouncement" id="disableAnnouncement" value="<?php echo $disableAnnouncement; ?>">
	<div id="ownnote-l10n">
		l10n["# day ago"] = "<?php p($l->t("# day ago")); ?>";
		l10n["# days ago"] = "<?php p($l->t("# days ago")); ?>";
		l10n["# hour ago"] = "<?php p($l->t("# hour ago")); ?>";
		l10n["# hours ago"] = "<?php p($l->t("# hours ago")); ?>";
		l10n["# minute ago"] = "<?php p($l->t("# minute ago")); ?>";
		l10n["# minutes ago"] = "<?php p($l->t("# minutes ago")); ?>";
		l10n["# month ago"] = "<?php p($l->t("# month ago")); ?>";
		l10n["# months ago"] = "<?php p($l->t("# months ago")); ?>";
		l10n["# second ago"] = "<?php p($l->t("# second ago")); ?>";
		l10n["# seconds ago"] = "<?php p($l->t("# seconds ago")); ?>";
		l10n["# week ago"] = "<?php p($l->t("# week ago")); ?>";
		l10n["# weeks ago"] = "<?php p($l->t("# weeks ago")); ?>";
		l10n["# year ago"] = "<?php p($l->t("# year ago")); ?>";
		l10n["# years ago"] = "<?php p($l->t("# years ago")); ?>";
		l10n["All"] = "<?php p($l->t("All")); ?>";
		l10n["You have no notes to display"] = "<?php p($l->t("You have no notes to display")); ?>";
		l10n["Create new notes or let others share their notes with you"] = "<?php p($l->t("Create new notes or let others share their notes with you")); ?>";
		l10n["An ungrouped file has the same name as a file in this group."] = "<?php p($l->t("An ungrouped file has the same name as a file in this group.")); ?>";
		l10n["Cancel"] = "<?php p($l->t("Cancel")); ?>";
		l10n["Create"] = "<?php p($l->t("Create")); ?>";
		l10n["Dismiss"] = "<?php p($l->t("Dismiss")); ?>";
		l10n["Filename/group already exists."] = "<?php p($l->t("Filename/group already exists.")); ?>";
		l10n["Group"] = "<?php p($l->t("Group")); ?>";
		l10n["Group already exists."] = "<?php p($l->t("Group already exists.")); ?>";
		l10n["Just now"] = "<?php p($l->t("Just now")); ?>";
		l10n["Modified"] = "<?php p($l->t("Modified")); ?>";
		l10n["Name"] = "<?php p($l->t("Name")); ?>";
		l10n["New"] = "<?php p($l->t("New")); ?>";
		l10n["Not grouped"] = "<?php p($l->t("Not grouped")); ?>";
		l10n["Shared with you"] = "<?php p($l->t("Shared with you")); ?>";
		l10n["Shared with others"] = "<?php p($l->t("Shared with others")); ?>";
		l10n["Note"] = "<?php p($l->t("Note")); ?>";
		l10n["Notes"] = "<?php p($l->t("Notes")); ?>";
		l10n["Quick Save"] = "<?php p($l->t("Quick Save")); ?>";
		l10n["Save"] = "<?php p($l->t("Save")); ?>";
	</div>
</div>