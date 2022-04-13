Program L_4_39;
Var a,b,c,k:real;
Begin
Read(a,b,c);
if (a<>0) and (b<>0)and (c<>0)
then k:=a*b*c
else k:=a+b+c;
Write (k);
end.