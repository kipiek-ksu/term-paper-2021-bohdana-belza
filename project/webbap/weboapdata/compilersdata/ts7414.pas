program l8_11;
var p,l:longint;
function biko(n,k:longint):longint;
begin
     if (k=1) or (k=n+1)
     then biko:=1
     else biko:=biko(n-1,k-1)+biko(n-1,k);
end;
Begin
     readln(p,l);
     writeln(biko(p,l));
End.