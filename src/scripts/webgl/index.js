const vertexShaderData = `
precision mediump float;

attribute vec2 vertPosition;
attribute vec3 vertColor;
varying vec3 fragColor;

void main()
{
    fragColor = vertColor;
    gl_Position = vec4(vertPosition, 0.0, 1.0);
}
`;

const fragmentShaderData = `
precision mediump float;

varying vec3 fragColor;

void main()
{
    gl_FragColor = vec4(fragColor, 1.0);
}
`;

document.addEventListener("DOMContentLoaded", () => {
    const canvas = document.getElementById('game');

    /** @type {WebGLRenderingContext} */
    const gl = canvas.getContext('webgl');

    if (!gl) {
        console.error("gl was not set");
        return;
    }

    gl.clearColor(0.0, 0.0, 0.5, 1.0);
    gl.clear(gl.COLOR_BUFFER_BIT | gl.DEPTH_BUFFER_BIT);

    const vertexShader = gl.createShader(gl.VERTEX_SHADER);
    gl.shaderSource(vertexShader, vertexShaderData);
    gl.compileShader(vertexShader);

    if (!gl.getShaderParameter(vertexShader, gl.COMPILE_STATUS)) {
        let compileVertexError = gl.getShaderInfoLog(vertexShader);
        console.error('error compiling vertex shader: ', compileVertexError);
        return;
    }

    const fragmentShader = gl.createShader(gl.FRAGMENT_SHADER);
    gl.shaderSource(fragmentShader, fragmentShaderData);
    gl.compileShader(fragmentShader);

    if (!gl.getShaderParameter(fragmentShader, gl.COMPILE_STATUS)) {
        let compileFragmentError = gl.getShaderInfoLog(fragmentShader);
        console.error('error compiling fragment shader: ', compileFragmentError);
        return;
    }

    const program = gl.createProgram();
    gl.attachShader(program, vertexShader);
    gl.attachShader(program, fragmentShader);
    gl.linkProgram(program);

    if (!gl.getProgramParameter(program, gl.LINK_STATUS)) {
        let compileProgramError = gl.getProgramInfoLog(program);
        console.error('error compiling program: ', compileProgramError);
        return;
    }

    // only do this not-in-production
    gl.validateProgram(program);
    if (!gl.getProgramParameter(program, gl.VALIDATE_STATUS)) {
        let validateProgramError = gl.getProgramInfoLog(program);
        console.error('error validating program: ', validateProgramError);
        return;
    }

    // const triangleVertices = [
    //     0.0, 0.5,
    //     -0.5, -0.5,
    //     0.5, -0.5
    // ];

    // the original just contained data to render the vertex points
    // the additional 3 elements per line are a vec3 for color; RGB
    const triangleVertices = [
        0.0, 0.5,         1.0, 1.0, 0.0,
        -0.5, -0.5,       0.0, 1.0, 1.0,
        0.5, -0.5,        1.0, 0.0, 1.0
    ];

    const buffer = gl.createBuffer();
    gl.bindBuffer(gl.ARRAY_BUFFER, buffer);
    gl.bufferData(gl.ARRAY_BUFFER, new Float32Array(triangleVertices), gl.STATIC_DRAW);

    const positionAttributeLocation = gl.getAttribLocation(program, 'vertPosition');
    const colorAttributeLocation = gl.getAttribLocation(program, 'vertColor');

    gl.vertexAttribPointer(
        positionAttributeLocation,
        2,
        gl.FLOAT,
        false,
        5 * Float32Array.BYTES_PER_ELEMENT,
        0
    );

    gl.vertexAttribPointer(
        colorAttributeLocation,
        3,
        gl.FLOAT,
        false,
        5 * Float32Array.BYTES_PER_ELEMENT,
        2 * Float32Array.BYTES_PER_ELEMENT
    );
    
    gl.enableVertexAttribArray(positionAttributeLocation);
    gl.enableVertexAttribArray(colorAttributeLocation);

    gl.useProgram(program);
    gl.drawArrays(gl.TRIANGLES, 0, 3);
});
