

<!-- Reviews Section -->

<?php if (isset($_GET['product_id'])): ?>
    <div class="reviews-container">
        <?php
        $product_id = intval($_GET['product_id']);
        $review_sql = "SELECT r.*, COALESCE(u.username, r.reviewer_name) as display_name 
                       FROM reviews r 
                       LEFT JOIN users u ON r.user_ID = u.user_ID 
                       WHERE r.product_id = ? 
                       ORDER BY r.review_date DESC";
        $stmt = $conn->prepare($review_sql);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $reviews = $stmt->get_result();

        if ($reviews->num_rows > 0) {
            while ($review = $reviews->fetch_assoc()) {
                echo '<div class="review">';
                echo '<h4>' . htmlspecialchars($review['display_name']) . '</h4>';
                echo '<div class="rating-stars">';
                for ($i = 1; $i <= 5; $i++) {
                    echo $i <= $review['rating'] ? '★' : '☆';
                }
                echo '</div>';
                echo '<p>' . nl2br(htmlspecialchars($review['review_text'])) . '</p>';
                echo '<small>' . date('M j, Y', strtotime($review['review_date'])) . '</small>';
                echo '</div>';
            }
        } else {
            echo '<p>No reviews yet. Be the first to review!</p>';
        }
        ?>
    </div>

    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
        
    <?php else: ?>
        
    <?php endif; ?>
<?php endif; ?>



<!-- Unified Review Section from homeStore.php -->



<!-- Corrected Review Section -->



<!-- Synchronized Review Section from homeStore.php -->



<!-- Cleaned Review Section (fixed htmlspecialchars + no duplicate) -->

<div class="review-section" id="reviews">
<?php if(isset($_GET['product_id'])): ?>
    <h2>Product Reviews</h2>

    <?php if(isset($_SESSION['review_error'])): ?>
        <div class="error-message"><?php echo $_SESSION['review_error']; unset($_SESSION['review_error']); ?></div>
    <?php endif; ?>

    <?php if(isset($_SESSION['review_success'])): ?>
        <div class="success-message"><?php echo $_SESSION['review_success']; unset($_SESSION['review_success']); ?></div>
    <?php endif; ?>

    <div class="reviews-container">
        <?php
        $product_id = intval($_GET['product_id']);
        $review_sql = "SELECT r.*, COALESCE(u.username, r.reviewer_name) as display_name 
                      FROM reviews r 
                      LEFT JOIN users u ON r.user_ID = u.user_ID 
                      WHERE r.product_id = ? 
                      ORDER BY r.review_date DESC";
        $stmt = $conn->prepare($review_sql);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $reviews = $stmt->get_result();

        if ($reviews->num_rows > 0) {
            while ($review = $reviews->fetch_assoc()) {
                echo '<div class="review">';
                echo '<h4>' . htmlspecialchars($review['display_name']) . '</h4>';
                echo '<div class="rating-stars">';
                for ($i = 1; $i <= 5; $i++) {
                    echo $i <= $review['rating'] ? '★' : '☆';
                }
                echo '</div>';
                echo '<p>' . nl2br(htmlspecialchars($review['review_text'])) . '</p>';
                echo '<small>' . date('M j, Y', strtotime($review['review_date'])) . '</small>';
                echo '</div>';
            }
        } else {
            echo '<p>No reviews yet. Be the first to review!</p>';
        }
        ?>
    </div>

    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
        <div class="review-form">
            <h3>Write a Review</h3>
            <form action="submit_review.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo isset($_GET['product_id']) ? htmlspecialchars($_GET['product_id']) : ''; ?>">

                <div class="form-group">
                    <label for="reviewer_name">Your Name:</label>
                    <input type="text" id="reviewer_name" name="reviewer_name" required>
                </div>

                <div class="rating-input">
                    <label>Rating:</label>
                    <select name="rating" required>
                        <option value="">Select rating</option>
                        <option value="1">1 Star</option>
                        <option value="2">2 Stars</option>
                        <option value="3">3 Stars</option>
                        <option value="4">4 Stars</option>
                        <option value="5">5 Stars</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="review_text">Your Review:</label>
                    <textarea id="review_text" name="review_text" rows="4" required></textarea>
                </div>

                <button type="submit" class="add-to-bag">Submit Review</button>
            </form>
        </div>
    <?php else: ?>
        <div class="review-form">
            <p class="login-prompt">You must <a href="signup_login.php?redirect=<?php echo basename($_SERVER['PHP_SELF']); ?><?php if (isset($_GET['product_id'])) echo '&product_id=' . htmlspecialchars($_GET['product_id']); ?>#reviews">log in</a> to write a review.</p>
        </div>
    <?php endif; ?>
<?php endif; ?>
</div>

