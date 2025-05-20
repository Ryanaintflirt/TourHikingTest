<?php
include 'header.php';
?>

<style>
.contact-container {
    max-width: 1200px;
    margin: 2rem auto;
    padding: 0 1rem;
}

.contact-header {
    text-align: center;
    margin-bottom: 3rem;
}

.contact-header h2 {
    color: #2c3e50;
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

.contact-header p {
    color: #7f8c8d;
    font-size: 1.1rem;
}

.contact-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
}

.contact-info {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.contact-info h3 {
    color: #2c3e50;
    margin-bottom: 1.5rem;
    font-size: 1.5rem;
}

.info-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 1.5rem;
}

.info-item i {
    color: #3498db;
    font-size: 1.2rem;
    margin-right: 1rem;
    margin-top: 0.2rem;
}

.info-item div {
    flex: 1;
}

.info-item h4 {
    color: #2c3e50;
    margin-bottom: 0.3rem;
}

.info-item p {
    color: #7f8c8d;
    line-height: 1.5;
}

.map-container {
    margin-top: 2rem;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.map-container iframe {
    width: 100%;
    height: 400px;
    border: none;
}

@media (max-width: 768px) {
    .contact-content {
        grid-template-columns: 1fr;
    }
    
    .contact-header h2 {
        font-size: 2rem;
    }
}
</style>

<div class="contact-container">
    <div class="contact-header">
        <h2>Contact Us</h2>
        <p>Get in touch with us for any questions or inquiries about our hiking adventures</p>
    </div>

    <div class="contact-content">
        <div class="contact-info">
            <h3>Our Information</h3>
            
            <div class="info-item">
                <i class="fas fa-map-marker-alt"></i>
                <div>
                    <h4>Address</h4>
                    <p>123 Hiking Trail Road<br>Mountain View, CA 94043<br>United States</p>
                </div>
            </div>

            <div class="info-item">
                <i class="fas fa-phone"></i>
                <div>
                    <h4>Phone</h4>
                    <p>+1 (555) 123-4567<br>+1 (555) 987-6543</p>
                </div>
            </div>

            <div class="info-item">
                <i class="fas fa-envelope"></i>
                <div>
                    <h4>Email</h4>
                    <p>info@hikingadventures.com<br>support@hikingadventures.com</p>
                </div>
            </div>

            <div class="info-item">
                <i class="fas fa-clock"></i>
                <div>
                    <h4>Business Hours</h4>
                    <p>Monday - Friday: 9:00 AM - 6:00 PM<br>Saturday: 10:00 AM - 4:00 PM<br>Sunday: Closed</p>
                </div>
            </div>
        </div>

        <div class="contact-info">
            <h3>Social Media</h3>
            
            <div class="info-item">
                <i class="fab fa-facebook"></i>
                <div>
                    <h4>Facebook</h4>
                    <p>@hikingadventures</p>
                </div>
            </div>

            <div class="info-item">
                <i class="fab fa-instagram"></i>
                <div>
                    <h4>Instagram</h4>
                    <p>@hikingadventures</p>
                </div>
            </div>

            <div class="info-item">
                <i class="fab fa-twitter"></i>
                <div>
                    <h4>Twitter</h4>
                    <p>@hikingadventures</p>
                </div>
            </div>

            <div class="info-item">
                <i class="fab fa-youtube"></i>
                <div>
                    <h4>YouTube</h4>
                    <p>Hiking Adventures Channel</p>
                </div>
            </div>
        </div>
    </div>

    <div class="map-container">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.6279041677!2d-122.08373992426498!3d37.42199997198757!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb7495bec0189%3A0x7c17d44a466baf9b!2sMountain%20View%2C%20CA%2C%20USA!5e0!3m2!1sen!2s!4v1709661234567!5m2!1sen!2s" 
            allowfullscreen="" 
            loading="lazy">
        </iframe>
    </div>
</div>

<?php include 'footer.php'; ?>