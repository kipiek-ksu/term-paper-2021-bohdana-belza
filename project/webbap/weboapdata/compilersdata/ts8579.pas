program l3_6;
type mas=array[0..400]of byte;
var a,b,r:mas;
    s:string;
    i,j,:integer;

procedure out(a:mas);
begin
     j:=400;
     while (a[j]=0)and(j<>0) do j:=j-1;
     for i:=j downto 0 do write(a[i]);
end;

procedure mn(a,b:mas; var c:mas);
var p:byte;
    k:word;
begin
     for i:=1 to a[0] do
     for j:=1 to b[0] do
     begin
          k:=i+j-2;
          c[k]:=c[k]+a[i]*b[j];
          p:=0; l:=l+5; t:=t+2;
          repeat
                c[k]:=c[k]+p;
                p:=c[k] div 10;
                c[k]:=c[k] mod 10;
                k:=k+1;l:=l+4; t:=t+1;
          until p=0;
     end;
end;
Begin
     readln(s);
     a[0]:=length(s);
     for i:=1 to a[0] do val(s[a[0]+1-i],a[i],j);
     readln(s);
     b[0]:=length(s);
     for i:=1 to b[0] do val(s[b[0]+1-i],b[i],j);
     mn(a,b,r);
     out(r);
End.
