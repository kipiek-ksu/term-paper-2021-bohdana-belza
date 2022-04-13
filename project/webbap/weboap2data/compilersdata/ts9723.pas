Program L_5_19;
 Var a,n,m,i,k:longint;
  Begin
   read(a,n);
    m:=n*n;
    k:=a*a;
    For i:=1 to a-2 do
     m:=m*n;
    For i:=1 to m-2 do
     k:=k*a;
      Write(k);
     end.