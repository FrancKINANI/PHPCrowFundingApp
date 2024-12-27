<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<div class="container mt-4">
    <h1 class="text-center">Edit Donation</h1>
    <form action="/php/PHPCrowFundingApp/public/index.php?action=updateDonation&id=<?= htmlspecialchars($donation['id']) ?>" method="POST">
        <h1>Title: <?php echo htmlspecialchars($project['title']); ?></h1>
        <p><strong>Description :</strong> <?php echo htmlspecialchars($project['description']); ?></p>
        <p><strong>Goal :</strong> <?php echo htmlspecialchars($project['goal_amount']); ?> €</p>
        <div class="form-group">
            <label for="amount">Donation Amount (€)</label>
            <input type="number" class="form-control" id="amount" name="amount" value="<?= htmlspecialchars($donation['amount']) ?>" min="1" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Donation</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';