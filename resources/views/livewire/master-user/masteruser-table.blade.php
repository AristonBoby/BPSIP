<div>
    <div class="col-md-12">
        <div class="card card-primary card-outline col-md-3">
             <div class="card-header">
                 <h5 class="col-label">Form Pendaftaran User</h5>
             </div>
             <div class="card-body">
                 <form wire:submit="create">
                     <div class="form-group row">
                         <label class="control-label col-lg-4">Nama</label>
                         <div class="col-md-8">
                             <input wire:model='name' type="text" class="form-control @error('name') is-invalid @enderror" wire:model="nama">
                             @error('name') <span class=" text-red">{{ $message }}</span> @enderror
                         </div>
                     </div>
                     <div class="form-group row">
                         <label class="control-label col-lg-4">Email</label>
                         <div class="col-md-8">
                             <input wire:model='email'type="email" class="form-control @error('email') is-invalid @enderror" wire:model="email">
                             @error('email') <span class=" text-red">{{ $message }}</span> @enderror
                         </div>
                     </div>
                     <div class="form-group row">
                         <label class="control-label col-lg-4">No.Hp</label>
                         <div class="col-md-8">
                             <input wire:model='no_hp' type="text" class="form-control @error('no_hp') is-invalid @enderror" wire:model="noHp">
                             @error('no_hp') <span class=" text-red">{{ $message }}</span> @enderror
                         </div>
                     </div>
                     <div class="form-group row">
                         <label class="control-label col-lg-4">Password</label>
                         <div class="col-md-8">
                             <input wire:model='pass' type="password" class="form-control @error('pass') is-invalid @enderror" wire:model="password">
                             @error('pass') <span class=" text-red">{{ $message }}</span> @enderror
                         </div>
                     </div>
                     <div class="form-group row">
                         <label class="control-label col-lg-4">Re Password</label>
                         <div class="col-md-8">
                             <input wire:model='re_pass' type="password" class="form-control" wire:model="re_password">
                         </div>
                     </div>
                     <div class="form-group row">
                         <div class="col-md-12">
                             <a class="btn btn-default float-right ml-2">Batal</a>
                             <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                         </div>
                     </div>
                 </form>
             </div>
        </div>
     </div>
</div>
