<?php

namespace PHPMaker2025\Pokja2025;

// Page object
$DocumentsAdd = &$Page;
?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { documents: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var fdocumentsadd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fdocumentsadd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["procurement_id", [fields.procurement_id.visible && fields.procurement_id.required ? ew.Validators.required(fields.procurement_id.caption) : null], fields.procurement_id.isInvalid],
            ["file_name", [fields.file_name.visible && fields.file_name.required ? ew.Validators.fileRequired(fields.file_name.caption) : null], fields.file_name.isInvalid],
            ["file_path", [fields.file_path.visible && fields.file_path.required ? ew.Validators.required(fields.file_path.caption) : null], fields.file_path.isInvalid],
            ["uploaded_at", [fields.uploaded_at.visible && fields.uploaded_at.required ? ew.Validators.required(fields.uploaded_at.caption) : null, ew.Validators.datetime(fields.uploaded_at.clientFormatPattern)], fields.uploaded_at.isInvalid]
        ])

        // Form_CustomValidate
        .setCustomValidate(
            function (fobj) { // DO NOT CHANGE THIS LINE! (except for adding "async" keyword)
                    // Your custom validation code in JAVASCRIPT here, return false if invalid.
                    return true;
                }
        )

        // Use JavaScript validation or not
        .setValidateRequired(ew.CLIENT_VALIDATE)

        // Dynamic selection lists
        .setLists({
            "procurement_id": <?= $Page->procurement_id->toClientList($Page) ?>,
        })
        .build();
    window[form.id] = form;
    currentForm = form;
    loadjs.done(form.id);
});
</script>
<script<?= Nonce() ?>>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php // Begin of Card view by Masino Sinaga, September 10, 2023 ?>
<?php if (!$Page->IsModal) { ?>
<div class="col-md-12">
  <div class="card shadow-sm">
    <div class="card-header">
	  <h4 class="card-title"><?php echo Language()->phrase("AddCaption"); ?></h4>
	  <div class="card-tools">
	  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
	  </button>
	  </div>
	  <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
<?php } ?>
<?php // End of Card view by Masino Sinaga, September 10, 2023 ?>
<form name="fdocumentsadd" id="fdocumentsadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="documents">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->getFormOldKeyName() ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->procurement_id->Visible) { // procurement_id ?>
    <div id="r_procurement_id"<?= $Page->procurement_id->rowAttributes() ?>>
        <label id="elh_documents_procurement_id" for="x_procurement_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->procurement_id->caption() ?><?= $Page->procurement_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->procurement_id->cellAttributes() ?>>
<span id="el_documents_procurement_id">
    <select
        id="x_procurement_id"
        name="x_procurement_id"
        class="form-select ew-select<?= $Page->procurement_id->isInvalidClass() ?>"
        <?php if (!$Page->procurement_id->IsNativeSelect) { ?>
        data-select2-id="fdocumentsadd_x_procurement_id"
        <?php } ?>
        data-table="documents"
        data-field="x_procurement_id"
        data-value-separator="<?= $Page->procurement_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->procurement_id->getPlaceHolder()) ?>"
        <?= $Page->procurement_id->editAttributes() ?>>
        <?= $Page->procurement_id->selectOptionListHtml("x_procurement_id") ?>
    </select>
    <?= $Page->procurement_id->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->procurement_id->getErrorMessage() ?></div>
<?= $Page->procurement_id->Lookup->getParamTag($Page, "p_x_procurement_id") ?>
<?php if (!$Page->procurement_id->IsNativeSelect) { ?>
<script<?= Nonce() ?>>
loadjs.ready("fdocumentsadd", function() {
    var options = { name: "x_procurement_id", selectId: "fdocumentsadd_x_procurement_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fdocumentsadd.lists.procurement_id?.lookupOptions.length) {
        options.data = { id: "x_procurement_id", form: "fdocumentsadd" };
    } else {
        options.ajax = { id: "x_procurement_id", form: "fdocumentsadd", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.documents.fields.procurement_id.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->file_name->Visible) { // file_name ?>
    <div id="r_file_name"<?= $Page->file_name->rowAttributes() ?>>
        <label id="elh_documents_file_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->file_name->caption() ?><?= $Page->file_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->file_name->cellAttributes() ?>>
<span id="el_documents_file_name">
<div id="fd_x_file_name" class="fileinput-button ew-file-drop-zone">
    <input
        type="file"
        id="x_file_name"
        name="x_file_name"
        class="form-control ew-file-input"
        title="<?= $Page->file_name->title() ?>"
        lang="<?= CurrentLanguageID() ?>"
        data-table="documents"
        data-field="x_file_name"
        data-size="255"
        data-accept-file-types="<?= $Page->file_name->acceptFileTypes() ?>"
        data-max-file-size="<?= $Page->file_name->UploadMaxFileSize ?>"
        data-max-number-of-files="null"
        data-disable-image-crop="<?= $Page->file_name->ImageCropper ? 0 : 1 ?>"
        aria-describedby="x_file_name_help"
        <?= ($Page->file_name->ReadOnly || $Page->file_name->Disabled) ? " disabled" : "" ?>
        <?= $Page->file_name->editAttributes() ?>
    >
    <div class="text-body-secondary ew-file-text"><?= $Language->phrase("ChooseFile") ?></div>
    <?= $Page->file_name->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->file_name->getErrorMessage() ?></div>
</div>
<input type="hidden" name="fn_x_file_name" id= "fn_x_file_name" value="<?= $Page->file_name->Upload->FileName ?>">
<input type="hidden" name="fa_x_file_name" id= "fa_x_file_name" value="0">
<table id="ft_x_file_name" class="table table-sm float-start ew-upload-table"><tbody class="files"></tbody></table>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->file_path->Visible) { // file_path ?>
    <div id="r_file_path"<?= $Page->file_path->rowAttributes() ?>>
        <label id="elh_documents_file_path" for="x_file_path" class="<?= $Page->LeftColumnClass ?>"><?= $Page->file_path->caption() ?><?= $Page->file_path->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->file_path->cellAttributes() ?>>
<span id="el_documents_file_path">
<input type="<?= $Page->file_path->getInputTextType() ?>" name="x_file_path" id="x_file_path" data-table="documents" data-field="x_file_path" value="<?= $Page->file_path->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->file_path->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->file_path->formatPattern()) ?>"<?= $Page->file_path->editAttributes() ?> aria-describedby="x_file_path_help">
<?= $Page->file_path->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->file_path->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->uploaded_at->Visible) { // uploaded_at ?>
    <div id="r_uploaded_at"<?= $Page->uploaded_at->rowAttributes() ?>>
        <label id="elh_documents_uploaded_at" for="x_uploaded_at" class="<?= $Page->LeftColumnClass ?>"><?= $Page->uploaded_at->caption() ?><?= $Page->uploaded_at->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->uploaded_at->cellAttributes() ?>>
<span id="el_documents_uploaded_at">
<input type="<?= $Page->uploaded_at->getInputTextType() ?>" name="x_uploaded_at" id="x_uploaded_at" data-table="documents" data-field="x_uploaded_at" value="<?= $Page->uploaded_at->EditValue ?>" placeholder="<?= HtmlEncode($Page->uploaded_at->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->uploaded_at->formatPattern()) ?>"<?= $Page->uploaded_at->editAttributes() ?> aria-describedby="x_uploaded_at_help">
<?= $Page->uploaded_at->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->uploaded_at->getErrorMessage() ?></div>
<?php if (!$Page->uploaded_at->ReadOnly && !$Page->uploaded_at->Disabled && !isset($Page->uploaded_at->EditAttrs["readonly"]) && !isset($Page->uploaded_at->EditAttrs["disabled"])) { ?>
<script<?= Nonce() ?>>
loadjs.ready(["fdocumentsadd", "datetimepicker"], function () {
    let format = "<?= DateFormat(0) ?>",
        options = {
            localization: {
                locale: ew.LANGUAGE_ID + "-u-nu-" + ew.getNumberingSystem(),
                hourCycle: format.match(/H/) ? "h24" : "h12",
                format,
                ...ew.language.phrase("datetimepicker")
            },
            display: {
                icons: {
                    previous: ew.IS_RTL ? "fa-solid fa-chevron-right" : "fa-solid fa-chevron-left",
                    next: ew.IS_RTL ? "fa-solid fa-chevron-left" : "fa-solid fa-chevron-right"
                },
                components: {
                    clock: !!format.match(/h/i) || !!format.match(/m/) || !!format.match(/s/i),
                    hours: !!format.match(/h/i),
                    minutes: !!format.match(/m/),
                    seconds: !!format.match(/s/i)
                },
                theme: ew.getPreferredTheme()
            }
        };
    ew.createDateTimePicker(
        "fdocumentsadd",
        "x_uploaded_at",
        ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options),
        {"inputGroup":true}
    );
});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready(['fdocumentsadd', 'jqueryinputmask'], function() {
	options = {
		'jitMasking': false,
		'removeMaskOnSubmit': true
	};
	ew.createjQueryInputMask("fdocumentsadd", "x_uploaded_at", jQuery.extend(true, "", options));
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fdocumentsadd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fdocumentsadd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
<?php } ?>
    </div><!-- /buttons offset -->
<?= $Page->IsModal ? "</template>" : "</div>" ?><!-- /buttons .row -->
</form>
<?php // Begin of Card view by Masino Sinaga, September 10, 2023 ?>
<?php if (!$Page->IsModal) { ?>
		</div>
     <!-- /.card-body -->
     </div>
  <!-- /.card -->
</div>
<?php } ?>
<?php // End of Card view by Masino Sinaga, September 10, 2023 ?>
<?php
$Page->showPageFooter();
?>
<?php if (!$Page->IsModal && !$Page->isExport()) { ?>
<script>
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fdocumentsadd.validateFields()){ew.prompt({title: ew.language.phrase("MessageAddConfirm"),icon:'question',showCancelButton:true},result=>{if(result)$("#fdocumentsadd").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("documents");
});
</script>
<?php if (Config("MS_ENTER_MOVING_CURSOR_TO_NEXT_FIELD")) { ?>
<script>
loadjs.ready("head", function() { $("#fdocumentsadd:first *:input[type!=hidden]:first").focus(),$("input").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("select").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("radio").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()})});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
