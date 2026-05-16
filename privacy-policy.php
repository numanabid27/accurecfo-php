<?php

require_once __DIR__ . '/includes/init.php';

set_page_meta(
    'Privacy Policy & Terms | AccureCFO',
    'Read AccureCFO privacy policy and terms and conditions. Learn how we protect client data, govern service use, and ensure confidentiality for bookkeeping and financial record-keeping services online.',
    'privacy-policy'
);
$pageStyles = array_merge($pageStyles, ['privacy-policy.css']);

render_page(function () {
    ?>
    <section class="privacySection">
      <div>
        <h1 class="sectionTitle">Privacy Policy & Terms and Conditions</h1>
        <p class="sectionText">
          AccureCFO efficiently resolves your queries with clear definitions,
          eliminating ambiguity. While creating the best financial strategies,
          we ensure the proper safety and privacy of our clients' data.
          The timesheets, material handling, deliverables, and IP are entirely
          confidential. Moreover, any dispute between third parties is governed
          by applicable law and jurisdiction.
        </p>
      </div>

      <div class="sectionWrapper">
        <h2 class="sectionTitle">1. Introduction</h2>
        <p class="sectionText">
          These Terms and Conditions ("Terms") regulate your use of and access to
          our website, services, and related tools or software supplied by AccureCFO
          ("we," "us," or "our"). When you use our bookkeeping and financial
          record-keeping services online, you accept to abide by and be bound by these
          Terms. If you do not agree, then immediately stop using our services.
        </p>

        <h2 class="sectionTitle">2. Services Provided</h2>
        <p class="sectionText">
          AccureCFO provides online bookkeeping, maintenance of financial records,
          reconciliation, and reporting. We may also offer optional assistance, such
          as catch-up bookkeeping, financial reports, and accounting software
          integration. The details, scope, and frequency of services shall be
          detailed in a written agreement or subscription plan between the Client
          and AccureCFO.
        </p>

        <h2 class="sectionTitle">3. Client Responsibilities</h2>
        <p class="sectionText">
          Customers are required to give accurate information, such as bank
          statements, invoices, receipts, and any other financial documents needed
          to conduct bookkeeping services. AccureCFO is not accountable for any
          errors that may have been caused by incomplete or inaccurate data
          received from the customer. Customers are accountable for checking reports
          and reporting any discrepancies within a sufficient period.
        </p>

        <h2 class="sectionTitle">4. Payment and Billing</h2>
        <p class="sectionText">
          All payments are due according to the payment plan or invoice. Payment
          terms and conditions will be published in writing. Failure to make a
          timely payment might trigger suspension of services until such time as
          payment is received in full. All fees are non-refundable except as
          otherwise specified in writing. Prices will be updated from time to
          time, and notice will be given before any change.
        </p>

        <h2 class="sectionTitle">5. Confidentiality</h2>
        <p class="sectionText">
          AccureCFO is committed to maintaining clients' confidentiality in respect
          of all business and financial information. We will not disclose, sell, or
          transfer client information to any third party except as required to
          deliver services, for compliance with law, or with written permission from
          the client beforehand. All employees and subcontractors of AccureCFO have
          strict confidentiality obligations.
        </p>

        <h2 class="sectionTitle">6. Limitation of Liability</h2>
        <p class="sectionText">
          AccureCFO aims to provide accurate and reliable services; nevertheless, we
          cannot ensure that our services are free from errors or interruptions. To
          the extent permitted under applicable law, AccureCFO will be held liable
          for any loss, damages, or costs that may directly or indirectly result
          from the use of our services, including but not limited to business
          disruption, loss of profits, or loss of data.
        </p>

        <h2 class="sectionTitle">7. Termination of Services</h2>
        <p class="sectionText">
          Either party can bring the agreement to an end by serving written notice,
          subject to any notice period agreed. On termination, the client shall pay
          all sums then due. AccureCFO will deliver all completed bookkeeping
          records up to the date of termination. No future obligations shall remain
          thereafter except as otherwise agreed.
        </p>
      </div>

      <div class="sectionWrapper">
        <h2 class="sectionTitle">Privacy Policy</h2>
        <p class="sectionText">
          We begin the process by collecting your information, including business
          details, to design a finance strategy. Afterwards, our experts prepare
          financial reports to boost clarity in your business's accounts.
        </p>
        <p class="sectionText">
          We prioritize our clients' decisions and disclose required information to
          third parties only if they consent. All data comply with legal obligations
          and conditions. While this process is ongoing, you have the right to
          restrict any service or request an audit.
        </p>

        <h2 class="sectionTitle">1. Introduction</h2>
        <p class="sectionText">
          AccureCFO honors your privacy and makes every sensible effort to protect
          your financial and personal information. This Privacy Policy details how
          we gather, use, store, and protect information gathered via our website,
          products, and communications.
        </p>

        <h2 class="sectionTitle">2. Information We Gather</h2>
        <p class="sectionText">
          To perform accounting services, we can gather business and personal
          information including your name, email address, business name, contact
          details, payment information, and accounting records. Non-identifiable
          data such as IP address, device, and browser type can also be collected
          to improve our web analysis.
        </p>

        <h2 class="sectionTitle">3. Your Data Usage</h2>
        <p class="sectionText">
          Your data is used only to offer and improve our services. It includes
          creating financial reports, processing bookkeeping tasks, invoicing,
          contact with you about your account, and customer care. Within or for
          service enhancements, anonymous data can be applied.
        </p>

        <h2 class="sectionTitle">4. Data Security and Storage</h2>
        <p class="sectionText">
          Encrypted servers with restricted access store all client information
          safely. We use internal access restrictions, SSL encryption, and secure
          passwords among other strong security measures. Although we take all
          practical safeguards, no digital system is completely immune to
          intrusions; hence, we cannot assure total data security.
        </p>

        <h2 class="sectionTitle">5. Sharing of Knowledge</h2>
        <p class="sectionText">
          AccureCFO does not lease, sell, or trade customer information. Only as
          needed to provide our services will we give reputable outside providers
          (e.g., accounting software vendors or cloud storage providers) restricted
          data. All outside parties have to follow strong data security and privacy
          policies.
        </p>

        <h2 class="sectionTitle">6. Storing of Data</h2>
        <p class="sectionText">
          Your information is kept only as long as it takes to reach the objective
          for which it was collected or as legally mandated. Depending on
          legislative or regulatory standards, customers may ask for a refurbishment
          or return of their data following service cancellation.
        </p>
      </div>
    </section>
    <?php
});
