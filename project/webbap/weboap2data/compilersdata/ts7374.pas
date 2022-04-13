Program Laba_2_1;
Var x,y,z,a,b:real;
Begin
read(x,y,z);
a:=(sqrt(abs(x-1))-sqrt(abs(y)))/(1+(sqr(x)/2+sqr(y)/4));
b:=x*(arctan(z)+exp(-(x+3)));
write(a:0:3,',b:0:3);
end.