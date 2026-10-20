

<?php
    $domain = $domain ?? null;
    $edit = $edit ?? false;
    $prefix = $prefix ?? ($edit ? 'edit_' : '');
?>




<div class="form-group">

    <label class="form-label">
        Associated Framework
    </label>

    <select
        id="<?php echo e($prefix); ?>framework_id"
        name="framework_id"
        class="form-control-aspia"
    >
        <option value="">-- None (Standalone Domain) --</option>
        <?php if(isset($frameworks) && $frameworks->isNotEmpty()): ?>
            <?php $__currentLoopData = $frameworks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($fw->id); ?>"
                    <?php echo e(old('framework_id', ($edit && $domain) ? $domain->framework_id : '') == $fw->id ? 'selected' : ''); ?>

                >
                    <?php echo e($fw->name); ?> (<?php echo e($fw->framework_code ?: $fw->framework_id); ?>)
                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </select>

</div>




<div class="form-group">

    <label class="form-label">
        Domain ID
        <span class="required-star">*</span>
    </label>

    <input
        type="text"
        id="<?php echo e($prefix); ?>domain_id"
        name="domain_id"
        class="form-control-aspia"
        value="<?php echo e(old('domain_id', ($edit && $domain) ? $domain->domain_id : '')); ?>"
        placeholder="Example: DOM-001"
        required
    >

</div>




<div class="form-group">

    <label class="form-label">
        Domain Code
    </label>

    <input
        type="text"
        id="<?php echo e($prefix); ?>domain_code"
        name="domain_code"
        class="form-control-aspia"
        value="<?php echo e(old('domain_code', ($edit && $domain) ? $domain->domain_code : '')); ?>"
        placeholder="Example: GOV"
    >

</div>




<div class="form-group">

    <label class="form-label">
        Domain Name
        <span class="required-star">*</span>
    </label>

    <input
        type="text"
        id="<?php echo e($prefix); ?>name"
        name="name"
        class="form-control-aspia"
        value="<?php echo e(old('name', ($edit && $domain) ? $domain->name : '')); ?>"
        placeholder="Example: Governance"
        required
    >

</div>




<div class="form-group">

    <label class="form-label">
        Slug
    </label>

    <input
        type="text"
        id="<?php echo e($prefix); ?>slug"
        name="slug"
        class="form-control-aspia"
        value="<?php echo e(old('slug', ($edit && $domain) ? $domain->slug : '')); ?>"
        placeholder="Example: governance"
    >

</div>




<div class="form-group">

    <label class="form-label">
        Purpose
    </label>

    <textarea
        id="<?php echo e($prefix); ?>purpose"
        name="purpose"
        class="form-control-aspia"
        placeholder="Enter the domain purpose"
    ><?php echo e(old('purpose', ($edit && $domain) ? $domain->purpose : '')); ?></textarea>

</div>




<div class="form-group">

    <label class="form-label">
        Scope
    </label>

    <textarea
        id="<?php echo e($prefix); ?>scope"
        name="scope"
        class="form-control-aspia"
        placeholder="Enter the domain scope"
    ><?php echo e(old('scope', ($edit && $domain) ? $domain->scope : '')); ?></textarea>

</div>




<div class="form-group">

    <label class="form-label">
        Business Owner
    </label>

    <input
        type="text"
        id="<?php echo e($prefix); ?>business_owner"
        name="business_owner"
        class="form-control-aspia"
        value="<?php echo e(old('business_owner', ($edit && $domain) ? $domain->business_owner : '')); ?>"
        placeholder="Example: Board / CISO"
    >

</div>




<div class="form-group full-width">

    <label class="form-label">
        Description
    </label>

    <textarea
        id="<?php echo e($prefix); ?>description"
        name="description"
        class="form-control-aspia"
        placeholder="Enter domain description"
    ><?php echo e(old('description', ($edit && $domain) ? $domain->description : '')); ?></textarea>

</div>




<div class="form-group">

    <label class="form-label">
        Display Order
    </label>

    <input
        type="number"
        id="<?php echo e($prefix); ?>display_order"
        name="display_order"
        class="form-control-aspia"
        value="<?php echo e(old('display_order', ($edit && $domain) ? $domain->display_order : '')); ?>"
        placeholder="Example: 1"
        min="0"
    >

</div>




<div class="form-group">

    <label class="form-label">
        Status
        <span class="required-star">*</span>
    </label>

    <select
        id="<?php echo e($prefix); ?>status"
        name="status"
        class="form-control-aspia"
        required
    >

        <option
            value=""
            disabled
            <?php echo e(old('status', ($edit && $domain) ? $domain->status : '') == '' ? 'selected' : ''); ?>

        >
            Select Status
        </option>

        <option
            value="Active"
            <?php echo e(old('status', ($edit && $domain) ? $domain->status : '') == 'Active' ? 'selected' : ''); ?>

        >
            Active
        </option>

        <option
            value="Inactive"
            <?php echo e(old('status', ($edit && $domain) ? $domain->status : '') == 'Inactive' ? 'selected' : ''); ?>

        >
            Inactive
        </option>

        <option
            value="Draft"
            <?php echo e(old('status', ($edit && $domain) ? $domain->status : '') == 'Draft' ? 'selected' : ''); ?>

        >
            Draft
        </option>

    </select>

</div>




<div class="form-group">

    <label class="form-label">
        Version
    </label>

    <input
        type="text"
        id="<?php echo e($prefix); ?>version"
        name="version"
        class="form-control-aspia"
        value="<?php echo e(old('version', ($edit && $domain) ? $domain->version : '')); ?>"
        placeholder="Example: 1"
    >

</div>




<div class="form-group">

    <label class="form-label">
        Short Overview
    </label>

    <textarea
        id="<?php echo e($prefix); ?>short_overview"
        name="short_overview"
        class="form-control-aspia"
        placeholder="Enter a short overview"
    ><?php echo e(old('short_overview', ($edit && $domain) ? $domain->short_overview : '')); ?></textarea>

</div>




<div class="form-group">

    <label class="form-label">
        Business Objectives
    </label>

    <textarea
        id="<?php echo e($prefix); ?>business_objectives"
        name="business_objectives"
        class="form-control-aspia"
        placeholder="Enter business objectives"
    ><?php echo e(old('business_objectives', ($edit && $domain) ? $domain->business_objectives : '')); ?></textarea>

</div>




<div class="form-group">

    <label class="form-label">
        Business Risks
    </label>

    <textarea
        id="<?php echo e($prefix); ?>business_risks"
        name="business_risks"
        class="form-control-aspia"
        placeholder="Enter business risks"
    ><?php echo e(old('business_risks', ($edit && $domain) ? $domain->business_risks : '')); ?></textarea>

</div>




<div class="form-group">

    <label class="form-label">
        Key Capabilities
    </label>

    <textarea
        id="<?php echo e($prefix); ?>key_capabilities"
        name="key_capabilities"
        class="form-control-aspia"
        placeholder="Enter key capabilities"
    ><?php echo e(old('key_capabilities', ($edit && $domain) ? $domain->key_capabilities : '')); ?></textarea>

</div>




<div class="form-group">

    <label class="form-label">
        Typical Stakeholders
    </label>

    <textarea
        id="<?php echo e($prefix); ?>typical_stakeholders"
        name="typical_stakeholders"
        class="form-control-aspia"
        placeholder="Example: Board, CISO, Compliance Officer"
    ><?php echo e(old('typical_stakeholders', ($edit && $domain) ? $domain->typical_stakeholders : '')); ?></textarea>

</div>




<div class="form-group">

    <label class="form-label">
        Applicable Industries
    </label>

    <textarea
        id="<?php echo e($prefix); ?>applicable_industries"
        name="applicable_industries"
        class="form-control-aspia"
        placeholder="Enter applicable industries"
    ><?php echo e(old('applicable_industries', ($edit && $domain) ? $domain->applicable_industries : '')); ?></textarea>

</div>




<div class="form-group">

    <label class="form-label">
        Applicable Technologies
    </label>

    <textarea
        id="<?php echo e($prefix); ?>applicable_technologies"
        name="applicable_technologies"
        class="form-control-aspia"
        placeholder="Enter applicable technologies"
    ><?php echo e(old('applicable_technologies', ($edit && $domain) ? $domain->applicable_technologies : '')); ?></textarea>

</div>




<div class="form-group">

    <label class="form-label">
        Keywords
    </label>

    <textarea
        id="<?php echo e($prefix); ?>keywords"
        name="keywords"
        class="form-control-aspia"
        placeholder="Example: governance, compliance, risk"
    ><?php echo e(old('keywords', ($edit && $domain) ? $domain->keywords : '')); ?></textarea>

</div>




<div class="form-group">

    <label class="form-label">
        Tags
    </label>

    <textarea
        id="<?php echo e($prefix); ?>tags"
        name="tags"
        class="form-control-aspia"
        placeholder="Example: governance, GRC"
    ><?php echo e(old('tags', ($edit && $domain) ? $domain->tags : '')); ?></textarea>

</div>




<div class="form-group">

    <label class="form-label">
        Why This Domain Matters
    </label>

    <textarea
        id="<?php echo e($prefix); ?>why_domain_matters"
        name="why_domain_matters"
        class="form-control-aspia"
        placeholder="Explain why this domain matters"
    ><?php echo e(old('why_domain_matters', ($edit && $domain) ? $domain->why_domain_matters : '')); ?></textarea>

</div>




<div class="form-group">

    <label class="form-label">
        Common Challenges
    </label>

    <textarea
        id="<?php echo e($prefix); ?>common_challenges"
        name="common_challenges"
        class="form-control-aspia"
        placeholder="Enter common challenges"
    ><?php echo e(old('common_challenges', ($edit && $domain) ? $domain->common_challenges : '')); ?></textarea>

</div>




<div class="form-group">

    <label class="form-label">
        Related Domains
    </label>

    <textarea
        id="<?php echo e($prefix); ?>related_domains"
        name="related_domains"
        class="form-control-aspia"
        placeholder="Enter related domains"
    ><?php echo e(old('related_domains', ($edit && $domain) ? $domain->related_domains : '')); ?></textarea>

</div>




<div class="form-group">

    <label class="form-label">
        Related Frameworks
    </label>

    <textarea
        id="<?php echo e($prefix); ?>related_frameworks"
        name="related_frameworks"
        class="form-control-aspia"
        placeholder="Enter related frameworks"
    ><?php echo e(old('related_frameworks', ($edit && $domain) ? $domain->related_frameworks : '')); ?></textarea>

</div><?php /**PATH C:\xampp\htdocs\AspiaUCL\resources\views/aspiaUcl/domains/form.blade.php ENDPATH**/ ?>