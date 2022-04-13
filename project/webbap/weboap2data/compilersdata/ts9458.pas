rogram z5;
Var x,q,w,s,j,i,c:integer;
    f:real;
Begin
Read(x);
s:=0;
j:=2;
Repeat
q:=x-j;
s:=s+q;
j:=j*2;
Until j>65;
i:=2;
c:=0;
Repeat
w:=x-i+1;
c:=c+w;
i:=i*2;
Until i>64;
f:=s/c;
Write(f:8:3);
end.