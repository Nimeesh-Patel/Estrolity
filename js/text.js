window.addEventListener('load', function() {
    // canvas setup
    //   const textInput = document.getElementById('textInput');
      const canvas = document.getElementById('textCanvas');
      const ctx = canvas.getContext('2d', {
        willReadFrequently: true
      });
      console.log(ctx)
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
  
      class Particle {
        constructor(effect, x, y){
            this.effect = effect;

            this.x = Math.random() * this.effect.canvasWidth;
            this.y = this.effect.canvasHeight;
            this.originX = x;
            this.originY = y;
            this.size = this.effect.gap;
            this.color = "white";
            this.dx = 0;
            this.dy = 0;
            this.vx = 0;
            this.vy = 0;
            this.force = 0;
            this.angle = 0;
            this.distance = 0;
            this.friction = Math.random() * 0.6 + 0.15;
            this.ease = Math.random() * 0.1 + 0.005;
        }
        update(){
            this.dx = this.effect.mouse.x - this.x;
            this.dy = this.effect.mouse.y - this.y;
            this.distance = this.dx * this.dx + this.dy * this.dy;
            this.force = -this.effect.mouse.radius / this.distance;
            if(this.distance < this.effect.mouse.radius) {
                this.angle = Math.atan2(this.dy, this.dx);
                this.vx += this.force * Math.cos(this.angle);
                this.vy += this.force * Math.sin(this.angle);
            }
            this.x += (this.vx *= this.friction) + (this.originX - this.x) * this.ease;
            this.y += (this.vy *= this.friction) + (this.originY - this.y) * this.ease;
        }
        draw(){
          // only change colours when this colour is different than previous
          this.effect.context.fillStyle = this.color;
          this.effect.context.fillRect(this.x, this.y, this.size, this.size);
        }
      }
  
      class Effect {
        constructor(context, canvasWidth, canvasHeight){
          this.context = context;
          this.canvasWidth = canvasWidth;
          this.canvasHeight = canvasHeight;
          this.maxTextWidth = this.canvasWidth * 0.8;
          this.fontSize = 200;
          this.textVerticalOffset = 0;
          this.textHorizontalOffset = 0;
          this.lineHeight = this.fontSize * 1.2;
          this.textX = this.canvasWidth / 2;
          this.textY = this.canvasHeight / 2 - this.lineHeight / 2;
        //   this.textInput = document.getElementById('textInput');
        //   this.textInput.addEventListener('keyup', e => {
        //       this.context.clearRect(0, 0, canvas.width, canvas.height);
        //       if (e.key !==' ') this.wrapText(e.target.value);
        //   });
  
          this.particles = [];
          this.gap = 1;
          this.mouse = {
              radius: 20000,
              x: 0,
              y: 0
          }
        //   this.mouse = { radius: 10000, x: undefined, y: undefined }; // Adjusted for a more localized interaction
          window.addEventListener("mousemove", e => {
              this.mouse.x = e.x;
              this.mouse.y = e.y;
          });
        }
        /* Examples of analogous combinations:
        Violet, blue, and teal.
        Red, fuchsia, and purple.
        Red, orange, and yellow.
        Green, blue, and purple.*/
        wrapText(text){
          this.context.font = this.fontSize + 'px Bangers';
          this.context.textAlign = 'center';
          this.context.textBaseline = 'middle';
          this.context.strokeStyle = 'white';
          this.context.lineWidth = 5;
          this.context.letterSpacing = "20px"; // experimental property
          this.context.imageSmoothingEnabled = false

          const edge = this.canvasWidth * 0.2;
          const gradient = this.context.createLinearGradient(edge, edge, this.canvasWidth - edge, this.canvasHeight - edge);

          let linesArray = [];
          let words = text.split(' ');
          let lineCounter = 0;
          let line = '';
          for (let i = 0; i < words.length; i++){
            let testLine = line + words[i] + ' ';
            if (this.context.measureText(testLine).width > this.maxTextWidth){       
              line = words[i] + ' ';
              lineCounter++;
            } else {
              line = testLine;
            }
            linesArray[lineCounter] = line;
          }
          let textHeight = this.lineHeight * lineCounter;
          this.textY = this.canvasHeight/2 -  textHeight/2 + this.textVerticalOffset;
          this.textX = this.canvasWidth/2 -  textHeight/2 + this.textHorizontalOffset;
          linesArray.forEach((el, index) => {
              this.context.fillText(el, this.textX, this.textY + (index * this.lineHeight));
              this.context.strokeText(el, this.textX, this.textY + (index * this.lineHeight));
          });
          this.convertToParticles();
        }
        convertToParticles() {
            this.particles = [];
            const pixels = this.context.getImageData(0, 0, this.canvasWidth, this.canvasHeight).data;
            for (let y = 0; y < this.canvasHeight; y += this.gap) {
                for (let x = 0; x < this.canvasWidth; x += this.gap) {
                    const index = (y * this.canvasWidth + x) * 4;
                    const alpha = pixels[index + 3];
                    if (alpha > 0) {
                        // Check neighboring pixels to see if it's an edge
                        const isEdge = this.isEdgePixel(x, y, pixels);
                        if (isEdge) {
                            // Higher chance of adding a particle at the edges
                            if (Math.random() > 0.4) { // Adjust this threshold as needed
                                this.addParticle(x, y, pixels, index);
                            }
                        } else {
                            // Lower chance of adding a particle in the interior
                            if (Math.random() > 0.85) { // Adjust this threshold as needed
                                this.addParticle(x, y, pixels, index);
                            }
                        }
                    }
                }
            }
            this.context.clearRect(0, 0, this.canvasWidth, this.canvasHeight);
        }
        
        isEdgePixel(x, y, pixels) {
            // Simplified check: looks at direct horizontal and vertical neighbors
            const neighborIndices = [
                ((y - this.gap) * this.canvasWidth + x) * 4, // Top
                ((y + this.gap) * this.canvasWidth + x) * 4, // Bottom
                (y * this.canvasWidth + (x - this.gap)) * 4, // Left
                (y * this.canvasWidth + (x + this.gap)) * 4  // Right
            ];
            return neighborIndices.some(index => pixels[index + 3] === 0);
        }
        
        addParticle(x, y, pixels, index) {
            const red = pixels[index];
            const green = pixels[index + 1];
            const blue = pixels[index + 2];
            this.particles.push(new Particle(this, x, y));
        }
        
        render(){
          this.particles.forEach(particle => {
            particle.update();
            particle.draw();
          })
        }
      }
      
      let effect = new Effect(ctx, canvas.width, canvas.height);
      effect.wrapText("Capricon"); //Change the text here
  
      function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        effect.render();
        requestAnimationFrame(animate);
      }
      animate();
  
      window.addEventListener('resize', function(){
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        effect = new Effect(ctx, canvas.width, canvas.height);
        // effect.wrapText(effect.textInput.value);
        effect.wrapText("Capricon"); //Change the text here
        console.log('resize')
      });
  });
