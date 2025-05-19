
int[] numbers = new int[20];
boolean isKeySet = false;
int keyInUse;
boolean done = false;

// Setup the Processing Canvas
void setup() {
  size(600, 400);
  strokeWeight(2);
  noLoop();

  for (int i = 0; i < numbers.length; i++) {
    numbers[i] = i + 1;
  }

  reset();
}

// Main draw loop
void draw() {
  drawBars();
}

int getMax(int[] numbers) {
  // Find maximum integer
  int max = numbers[0];
  for (int i = 1; i < numbers.length; i++) {
    if (max < numbers[i]) {
      max = numbers[i];
    }
  }
  return max;
}

void drawBars() {
  double h = height * 0.88;
  double w = width - 60;
  double unitWidth = w * 1.0 / numbers.length;
  int max = getMax(numbers);

  for (int i = 0; i < numbers.length; i++) {
    fill(#C0C0C0); // Color dim gray
    rect(i * unitWidth + 30, height
      - ((numbers[i] + 1) / max) * h, unitWidth, ((numbers[i] + 1) / max) * h - 20);
    fill(0, 102, 153);
    text(numbers[i], i * unitWidth + 30 + 10,
      height - ((numbers[i] + 1) / max) * h - 7);
    text(i, i * unitWidth + 30 + 10, height - 5);
  }

  text("index", 1, height - 5);

  fill(#FF0000); // Color red
  if (isKeySet) {
    text("Search for key " + keyInUse, 10, 10);
  }

  if (coloredBarIndex >= 0) {
    int i = coloredBarIndex;
    rect(i * unitWidth + 30, height
      - (numbers[i] + 1) / max * h, unitWidth, ((numbers[i] + 1) / max) * h - 20);
  }
}

int coloredBarIndex = -1;

void reset() {
  isKeySet = false;
  coloredBarIndex = -1;
  done = false;

  // Fill canvas grey
  background(new color("white"));

  for (int i = 0; i < numbers.length; i++) {
    int index = int(random(numbers.length));
    int temp = numbers[index];
    numbers[index] = numbers[i];
    numbers[i] = temp;
  }
}

int getKey() {
  return keyInUse;
}

int step(int key) {
  if (!isKeySet) {
    isKeySet = true;
    keyInUse = key; // Set key in the first step
  }

  if (done)
    return coloredBarIndex;

  coloredBarIndex++;

  if (coloredBarIndex >= numbers.length) {
    return -2; // Out of range
  }

  draw();

  if (numbers[coloredBarIndex] == keyInUse) {
    done = true; // Found
    return coloredBarIndex;
  }
  else {
    return -1;
  }
}
