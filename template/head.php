<div class="uk-sticky uk-sticky-fixed uk-padding uk-padding-remove-top uk-padding-remove-bottom uk-padding-remove-left" uk-sticky style="position:fixed; background:white">
        <div class="uk-text-right">
            <div class="uk-inline">
                <a class="uk-navbar-toggle mdi mdi-magnify mdi-24px" href="#"></a>
                <div class="uk-drop" uk-drop="mode: click; pos: left-center; offset: 0">
                    <!-- <form class="uk-search uk-search-navbar uk-width-1-1" > -->
                        <input class="uk-search-input" type="search" name="search" id="search-engine" placeholder="search..." autofocus>
                    <!-- </form> -->
                </div>
            </div>
            <!-- alert -->
            <button class="uk-button uk-button-small" uk-toggle="target: #layout-alert" uk-tooltip="title: notification; pos: bottom; offset: -5">
                <div class="notif-icon">
                    <span class=" mdi mdi-bell mdi-24px uk-margin-small-right"></span>
                </div>
                <div class="badge-notif" style="display:none">
                    <span class="uk-badge" id="notif-count" style="font-size:10px;min-width: 20px;height: 20px;"></span>
                </div>
            </button>
            <div id="layout-alert" class="uk-width-large" uk-drop="mode: click; pos: bottom-center">
				<div class="uk-card uk-card-body uk-card-default uk-padding-remove uk-background-muted">
					<div class="uk-height-medium uk-overflow-auto">
						<ul class="uk-list uk-text-left uk-list-divider" id="notif-data">
							
						</ul>
					</div>
					<div class="uk-text-center border-top uk-margin-remove uk-link" uk-toggle="target: #layout-alert"><span class="mdi mdi-chevron-up"></span></div>
				</div>
            </div>
            <!-- account -->
            <button class="uk-text-primary uk-button uk-button-small" uk-toggle="target: #layout-account" uk-tooltip="title: account; pos: bottom; offset: -5">
				<span class="mdi mdi-account-circle mdi-24px uk-margin-small-right"></span>
			</button>
			<div id="layout-account" class="uk-width-medium" uk-drop="mode: click; pos: bottom-center">
				<div class="uk-card uk-card-default uk-text-left uk-padding">
					<div class="uk-card-body">
						<div class="uk-grid-small uk-flex-middle" uk-grid>
							<div class="uk-width-auto">
								<img class="uk-border-circle" width="40" height="40" src="#">
							</div>
							<div class="uk-width-expand">
								<h3 class="uk-card-title uk-margin-remove-bottom">Dummy</h3>
								<p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00">dummy@mail.com</time></p>
							</div>
						</div>
					</div>
					<div class="uk-card-footer uk-padding-remove uk-text-center">
						<a href="#" class="uk-button uk-button-link uk-button-small uk-text-capitalize">#</a>
						<span>&nbsp;|&nbsp;</span>
						<a href="#" class="uk-button uk-button-link uk-text-muted uk-button-small uk-text-capitalize">Logout</a>
					</div>
				</div>
			</div>
        </div>
    </div>